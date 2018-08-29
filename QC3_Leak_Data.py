#!/usr/bin/env python
from datetime import datetime,date,time
#from time import sleep
from xml.etree.ElementTree import Element, SubElement, Comment, tostring
#import serial
import time
import xlrd
from xlrd import xldate
import re
import sys
#import statistics
from xmlConversion import generateXMLHeader, generateDataSet, writeToFile,writeToFile1
from xmlConversion import generateXMLDatafastamb,generateXMLDatafast,generateXMLDatalongamb,generateXMLDatalong, generateXMLData3,generateXMLData3a,generateXMLData4,generateXMLData4a,generateXMLData5a,generateXMLData5,generateXMLData4s


#QC3
def xml_from_excel3(excel_file):
	wb = xlrd.open_workbook(excel_file)
	sh = wb.sheet_by_index(0)
	#tags = [n.replace(" ", "").lower() for n in sh.row_values(0)]
	#Start=sys.argv[6]+ " " + sys.argv[7]
	#Stop=sys.argv[8]+ " " + sys.argv[9]
	Start=sys.argv[6]
	Stop=sys.argv[7]
	#chamber=sh.cell(2,7).value
	chamber=sys.argv[11]
	Date=str(Start[0:10])
	location = sys.argv[3]
	user=sys.argv[4]
	comment = sys.argv[5]
	Comments=sys.argv[10]
	Run =sys.argv[2]
	
	root = generateXMLHeader("QC3_GAS_LEAK_DATA","GEM Chamber QC3 Gas Leak Data",str(location) + " GEM QC3 Gas Leak Data",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSet(root,Comments,"1","GEM Chamber",chamber)	
	for row in range(1,sh.nrows):
			seconds= sh.row_values(row)[1]
			pre= sh.row_values(row)[2]
			temp =sh.row_values(row)[3]
			ambp= sh.row_values(row)[4]
			increment_hr= sh.row_values(row)[5]
			temp_k = sh.row_values(row)[6]	
			times = xlrd.xldate_as_tuple(sh.row_values(row)[0], wb.datemode)
			times=str(times).replace(",",":")
			times = str(times).replace(")","")
			times = str(times).replace("("," ")
			generateXMLData3(dataSet,Date +str(times[9:]),str(seconds),str(pre), str(ambp), str(temp), str(increment_hr), str(temp_k))
			writeToFile(fileName, tostring(root))
	#test_date=sh.cell(0,7).value
	test_date=Start
	avgtemp=sh.cell(32,10).value
	stdtemp=sh.cell(32,11).value
	avgpre=sh.cell(33,10).value
	stdpre=sh.cell(33,11).value
	initpre = sh.cell(34,10).value
	finalpre = sh.cell(35,10).value
	duration = sh.cell(36,10).value
	leakrate = sh.cell(37,10).value
	expofitp0=sh.cell(38,10).value 
	expofitp1=sh.cell(39,10).value 
	time_constant=sh.cell(40,10).value
	elog=sys.argv[8]
	File=sys.argv[9]
	#Comments=sys.argv[10]
	root = generateXMLHeader("QC3_GAS_LEAK_DATA_SUMRY","GEM Chamber QC3 Gas Leak Data Summary",str(location) + " GEM QC3 Gas Leak Data",Run,Start,Stop,comment, location,user)
	dataSet = generateDataSet(root,Comments,"1","GEM Chamber",chamber)
	generateXMLData3a(dataSet, str(test_date) ,str(avgtemp),str(stdtemp),str(avgpre),str(stdpre),str(initpre),str(finalpre),str(duration),str(leakrate),str(expofitp0),str(expofitp1),str(elog),str(File),str(Comments),str(time_constant))
	writeToFile1(testfile, tostring(root))



if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
	#datafile=fname+"_Data.xml"
	testfile=fname+"_summry.xml"
	xml_from_excel3(fname)	
