import csv
from var_dump import *
import json
startno = 0
with open('IDD.csv', newline='') as csvfile:
    idd = list(csv.reader(csvfile))


with open('dan.csv', newline='') as csvfile:
    dan = list(csv.reader(csvfile))



#var_dump(dan)
i = 4
a = 1

def rmi(no, array):
	i = 0
	for i in range(19):
		del array[no][4]
		i = i + 1
	array[no][4] = int(no / 12 + 1)
	array[no][5] = array[no][1] + " " + array[no][0] + " " + array[no][2]+".png"
	array[no][6] = no + startno

def tidyarray(array):
	del array[0]
	i = 0
	x = len(array)
	for i in range(0,x):
		rmi(i,array)
		i = i + 1	


tidyarray(dan)

danjson = json.dumps(dan)

file1 = open("dan.json","w") 
file1.write(danjson)
#var_dump(dan)

#var_dump(dan)
"""
i = 1
def dan(data, a):
	if(a == 33):
		exit()
	else:
		if(data[a][3] == ""):
			print(data[a][1]+" "+data[a][0]+": No Data")
		else: 
			j = 0
			print(data[a][1]+" "+data[a][0]+": "+data[a][3])
		a = a + 1
	return(a)



print("IDD")
while True:
	if(i == 43):
		print("dan")
		a = 1
		a = dan(dan, a)
		i = i + 1
	elif(i == 44):
		a = dan(dan, a)
	else:
		if(data[i][3] == ""):
			j =0
			#print(data[i][1]+" "+data[i][0]+": No Data")
		else: 
			j = 0
			#print(data[i][1]+" "+data[i][0]+": "+data[i][3])
		i = i + 1
"""