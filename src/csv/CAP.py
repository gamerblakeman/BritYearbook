import csv
#from var_dump import *
import json


startno = 0

with open('cap.csv', newline='') as csvfile:
    pa = list(csv.reader(csvfile))



#var_dump(pa)
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


tidyarray(pa)

pajson = json.dumps(pa)

file1 = open("cap.json","w") 
file1.write(pajson)
