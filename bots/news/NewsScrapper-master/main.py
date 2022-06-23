from lxml import html
import requests
import pandas as pd
from bs4 import BeautifulSoup
from lxml.html import fromstring
import re
import lxml.html as lh
from datetime import datetime
import numpy as np
from openpyxl import load_workbook

#------------------------------------------------------------------------------------#
print('1/ scraping Parlam-senate https://www.parlam.kz/ru/mazhilis/sent-to-the-senate')
page = requests.get('https://www.parlam.kz/ru/mazhilis/sent-to-the-senate')
soup = BeautifulSoup(page.text, 'html.parser')


table = soup.find('table', {"class": "table col-sm-12 table-bordered table-striped table-condensed cf"})


def pre_process_table(table):

    rows = [x for x in table.find_all('tr')]

    num_rows = len(rows)

    num_cols = max([len(x.find_all(['th','td'])) for x in rows])

    header_rows_set = [x.find_all(['th', 'td']) for x in rows if len(x.find_all(['th', 'td']))>num_cols/2]

    num_cols_set = []

    for header_rows in header_rows_set:
        num_cols = 0
        for cell in header_rows:
            row_span, col_span = get_spans(cell)
            num_cols+=len([cell.getText()]*col_span)

        num_cols_set.append(num_cols)

    num_cols = max(num_cols_set)

    return (rows, num_rows, num_cols)


def get_spans(cell):
        if cell.has_attr('rowspan'):
            rep_row = int(cell.attrs['rowspan'])
        else: 
            rep_row = 1
        if cell.has_attr('colspan'):
            rep_col = int(cell.attrs['colspan'])
        else: 
            rep_col = 1 

        return (rep_row, rep_col)

def process_rows(rows, num_rows, num_cols):
    data = pd.DataFrame(np.ones((num_rows, num_cols))*np.nan)
                
    for i, row in enumerate(rows):
        try:
            col_stat = data.iloc[i,:][data.iloc[i,:].isnull()].index[0]
        except IndexError:
            print(i, row)

        for j, cell in enumerate(row.find_all(['td', 'th'])):
            
            rep_row, rep_col = get_spans(cell)

            while any(data.iloc[i,col_stat:col_stat+rep_col].notnull()):
                col_stat+=1

            data.iloc[i:i+rep_row,col_stat:col_stat+rep_col] = cell.getText()
            if col_stat<data.shape[1]-1:
                col_stat+=rep_col

    return data

def main(table):
    rows, num_rows, num_cols = pre_process_table(table)
    df = process_rows(rows, num_rows, num_cols)
    return(df)


  
        
rows, num_rows, num_cols = pre_process_table(table)
df = process_rows(rows, num_rows, num_cols)



df.drop(df.index[0], inplace = True)
df.rename(columns=df.iloc[0], inplace = True)
df.drop(df.index[0], inplace = True)
df = df.replace('\n','', regex=True)


today = datetime.today().strftime('%Y-%m-%d')


df['Дата'] = pd.to_datetime(df['Дата'],format='%d.%m.%Y').dt.strftime('%Y-%m-%d')
df = df.loc[(df['Дата'] >= today)]
#df = df.loc[(df['Дата'] >= "2022-03-30")]

df.drop(['Внесенные Президентом', 'Инициированные депутатами', 'Внесенные правительством', 'Одобренные Мажилисом и направленные в Сенат'], axis=1, inplace=True)
df.insert(len(df.columns), 'Ссылка', 'https://www.parlam.kz/ru/mazhilis/sent-to-the-senate')

#--------------------------------------------------------------------------------------------------------
print('2/ scraping AKORDA/Legal_acts https://www.akorda.kz/ru/legal_acts')
page = requests.get('https://www.akorda.kz/ru/legal_acts')
soup = BeautifulSoup(page.text, 'html.parser')

news_name=[]

news_name_list = soup.find_all('h3')
for news in news_name_list:
      if news.find('a'):
        news_name.append(news.find('a')['href'])
        news_name.append(news.find('a').text)
        
links, names = news_name[::2], news_name[1::2]

for i in range(len(links)):
    links[i] = "https://www.akorda.kz"+links[i]
        
date=[]

for date_time in soup.find_all('h5'):
    date.append(date_time.text)
    
source = list(range(len(names)))
for i in range(len(names)):
    source[i] = "Акорда (события)"
    

#df1['Дата'] = pd.to_datetime(df1['Дата'],format='%d.%m.%Y').dt.strftime('%Y-%m-%d')
    
df1 = pd.DataFrame(columns = ['Дата','Наименование', 'Ссылка'])


df1['Наименование'] = names
df1['Дата'] = date
df1['Ссылка'] = links

#dates 
df1['Дата'] = df1['Дата'].str.replace('января','.01.')
df1['Дата'] = df1['Дата'].str.replace('февраля','.02.')
df1['Дата'] = df1['Дата'].str.replace('марта','.03.')
df1['Дата'] = df1['Дата'].str.replace('апреля','.04.')
df1['Дата'] = df1['Дата'].str.replace('мая','.05.')
df1['Дата'] = df1['Дата'].str.replace('июня','.06.')
df1['Дата'] = df1['Дата'].str.replace('июля','.07.')
df1['Дата'] = df1['Дата'].str.replace('августа','.08.')
df1['Дата'] = df1['Дата'].str.replace('сентября','.09.')
df1['Дата'] = df1['Дата'].str.replace('октября','.10.')
df1['Дата'] = df1['Дата'].str.replace('ноября','.11.')
df1['Дата'] = df1['Дата'].str.replace('декабря','.12.')

df1["Дата"] = df1["Дата"].str.replace("года", "")
df1['Дата'] = df1['Дата'].str.replace(' ', '')

df1['Дата'] = pd.to_datetime(df1['Дата'],format='%d.%m.%Y').dt.strftime('%Y-%m-%d')

today = datetime.today().strftime('%Y-%m-%d')

df1 = df1.loc[(df1['Дата'] >= today)]

#------------------------------------------------------------------------------------------------------
print('3/ scraping SENATE https://senate.parlam.kz/ru-RU/lawProjects/index?p=2')
page = requests.get('https://senate.parlam.kz/ru-RU/lawProjects/index?p=2')
soup = BeautifulSoup(page.text, 'html.parser')

news_table = []
news_table_info = []

news_table_list = soup.find_all('td')

for title in news_table_list:
    if title.find('a'):
        news_table.append(title.find('a')['href'])
        news_table.append(title.text.strip())
    else: 
        news_table_info.append(title.text.strip())

links, names = news_table[::2], news_table[1::2]

for i in range(len(links)):
    links[i] = "https://senate.parlam.kz"+links[i]

source = list(range(len(names)))
for i in range(len(names)):
    source[i] = "Сенат (новости)"

id_number, register_date, register_number, decision_date = news_table_info[::4], news_table_info[1::4], news_table_info[2::4], news_table_info[3::4]


df2 = pd.DataFrame(columns = ['Дата','Наименование','Ссылка'])

df2['Дата'] = register_date
df2['Наименование'] = names
df2['Ссылка'] = links


df2['Дата'] = pd.to_datetime(df2['Дата'],format='%d.%m.%Y').dt.strftime('%Y-%m-%d')

today = datetime.today().strftime('%Y-%m-%d')


df2 = df2.loc[(df2['Дата'] >= today)]
#------------------------------------------------------------------------------------------------------------------
print('4/ scraping Parlam https://www.parlam.kz/ru/mazhilis/news')
page = requests.get('https://www.parlam.kz/ru/mazhilis/news')
soup = BeautifulSoup(page.text, 'html.parser')

text = []
links = []

news_link = soup.find_all('div' , {"class": "list"})

for link in news_link:
    if link.find('a'):
        links.append(link.find('a')['href'])
    if link.find('div', {"class": "col-md-10"}):
        text.append(link.text.strip().splitlines())
        
date = [i[0] for i in text]
title = [i[1] for i in text]

source = list(range(len(title)))
for i in range(len(title)):
    source[i] = "Мажилис (законопроекты)"
    
for i in range(len(links)):
    links[i] = "https://www.parlam.kz"+links[i]

df3 = pd.DataFrame(columns = ['Дата','Наименование',  'Ссылка'])

df3['Дата'] = date
df3['Наименование'] = title
df3['Ссылка'] = links

df3['Дата'] = pd.to_datetime(df3['Дата'],format='%d.%m.%Y').dt.strftime('%Y-%m-%d')

today = datetime.today().strftime('%Y-%m-%d')

df3 = df3.loc[(df3['Дата'] >= today)]

#------------------------------------------------------------------------------------------------
print('5/ scraping Prime-minister https://primeminister.kz/ru/news')
page = requests.get('https://primeminister.kz/ru/news')
soup = BeautifulSoup(page.text, 'html.parser')


links = [item['href'] for item in soup.select('a.article')]

text=[]
date = []

news_name_list = soup.find_all('h3')

for title in news_name_list:
    text.append(title.text)

for item in soup.find_all(class_="article__date"):
    date.append(item.text)

date = [x.replace("\r\n","") for x in date]

source = list(range(len(text)))
for i in range(len(text)):
    source[i] = "Премьер-Министра Республики Казахстан"
    

for i in range(len(links)):
    links[i] = "https://primeminister.kz/ru/news"+links[i]

df5 = pd.DataFrame(columns = ['Дата', 'Наименование', 'Ссылка'])

#df5 = pd.DataFrame(columns = ['Дата'])

df5['Наименование'] = text
df5['Дата'] = date
df5['Ссылка'] = links

df5['Дата'] = df5['Дата'].str.replace('Янв','.01.')
df5['Дата'] = df5['Дата'].str.replace('Фев','.02.')
df5['Дата'] = df5['Дата'].str.replace('Мар','.03.')
df5['Дата'] = df5['Дата'].str.replace('Апр','.04.')
df5['Дата'] = df5['Дата'].str.replace('Май','.05.')
df5['Дата'] = df5['Дата'].str.replace('Июн','.06.')
df5['Дата'] = df5['Дата'].str.replace('Июл','.07.')
df5['Дата'] = df5['Дата'].str.replace('Авг','.08.')
df5['Дата'] = df5['Дата'].str.replace('Сен','.09.')
df5['Дата'] = df5['Дата'].str.replace('Окт','.10.')
df5['Дата'] = df5['Дата'].str.replace('Ноя','.11.')
df5['Дата'] = df5['Дата'].str.replace('Дек','.12.')

df5['Дата'] = df5['Дата'].str.replace(' ', '')

df5['Дата'] = pd.to_datetime(df5['Дата'],format='%d.%m.%Y').dt.strftime('%Y-%m-%d')

today = datetime.today().strftime('%Y-%m-%d')

df5 = df5.loc[(df5['Дата'] >= today)]

#-----------------------------------------------------------------------------------------------------
print('6/ scraping KGD.GOV http://kgd.gov.kz/ru/news/archive ...')
page = requests.get('http://kgd.gov.kz/ru/news/archive')
tree = html.fromstring(page.content)

titles = tree.xpath('//div[@class="col-md-7 col-xs-12"]/a/text()')

dates = tree.xpath('//div[@class="date"]/strong/a/text()')
     
links = tree.xpath('//div[@class="col-md-7 col-xs-12"]/a/@href')
for i in range(len(links)):
    links[i] = "http://kgd.gov.kz"+links[i]
    
source = list(range(len(titles)))
for i in range(len(titles)):
    source[i] = "КГД.ГОВ (новости)"

df6 = pd.DataFrame(columns = ['Дата', 'Наименование', 'Ссылка'])


df6['Наименование'] = titles
df6['Дата'] = dates
df6['Ссылка'] = links

df6['Дата'] = pd.to_datetime(df6['Дата'],format='%d.%m.%Y').dt.strftime('%Y-%m-%d')

today = datetime.today().strftime('%Y-%m-%d')

df6 = df6.loc[(df6['Дата'] >= today)]
#----------------------------------------------------------------------------------------------------------------------------

frames = [df,df1,df2,df3,df5,df6]
result = pd.concat(frames)

result.to_excel(r'./news_to_gmail.xlsx')
print("Saved to ./news_to_gmail.xlsx\nDont touch anything")
