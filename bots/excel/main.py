import pandas as pd
import numpy as np

f = open("path.txt", "r")
path = f.read()
df = pd.read_excel('C:/xampp/htdocs/sky_metrics/xls/'+path)

# df = pd.read_excel ('C:/xampp/htdocs/sky_metrics/bots/excel/First_Tax_Declaration.xlsx')
df.loc[df['Equipments_name'].str.contains('name_1'), 'Taxable'] = 'Taxable'


def my_fun (var1,var2,var3, var4, var5):
    df[var5]= np.where(df[var1] == 'Taxable', (df[var2]+df[var3])*df[var4]*5/100, 0)
    return df

df = my_fun('Taxable','Equipment Cost','Invoice','Quantity', 'Tax')

file_name = 'Result.xlsx'
df.to_excel(file_name)
print('Data is written to Excel File successfully.')