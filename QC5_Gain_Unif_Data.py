#!/usr/bin/env python
from datetime import datetime,date,time
from time import sleep
from xml.etree.ElementTree import Element, SubElement, Comment, tostring
#import serial
import time
import xlrd
from xlrd import xldate
import re
import sys
#import statistics
from xmlConversion import generateXMLHeader, generateDataSet, writeToFile,writeToFile1, generateDataSetBlob
from xmlConversion import generateXMLDatafastamb,generateXMLDatafast,generateXMLDatalongamb,generateXMLDatalong, generateXMLData3,generateXMLData3a,generateXMLData4,generateXMLData4a,generateXMLData5a,generateXMLData5,generateXMLData4s, generateXMLData5s,generateXMLData5unif,generateXMLData5unif_data
#from flask import Flask, render_template
#from flask_sqlalchemy import SQLAlchemy
#from sqlalchemy import create_engine, MetaData, Table, and_
#from sqlalchemy.sql import select


#QC5
def xml_from_excel5(excel_file):
	user = sys.argv[5]
	chamber=sys.argv[2]
	Run=sys.argv[3]
	location=sys.argv[4]
	Start=sys.argv[7]
	Stop=sys.argv[8]
	Date=str(Start[0:10])
	comment=sys.argv[6]
	Elog=sys.argv[9]
	File=sys.argv[10]
	Comment=sys.argv[11]
        plot1=sys.argv[12]
        plot2=sys.argv[13]
        plot3=sys.argv[14]
        plot4=sys.argv[15]
        plot5=sys.argv[16]
        plot6=sys.argv[17]
	root = generateXMLHeader("QC5_GAIN_UNIF_CONFIG","GEM Chamber QC5 Gain Uniformity Config", " GEM Chamber QC5 Gain Uniformity Config",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSetBlob(root,Comment,str(fname),"1","GEM Chamber",chamber)
	generateXMLData5unif(dataSet,str(fname),str(File),str(Elog),str(Comment))
	writeToFile(fileName, tostring(root))
	
	root = generateXMLHeader("QC5_GAIN_UNIF_DATA","GEM Chamber QC5 Gain Uniformity Data"," GEM Chamber QC5 Gain Uniformity Data",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSetBlob(root,Comment,str(fname),"1","GEM Chamber",chamber)
        generateXMLData5unif_data(dataSet,str(plot1))
	writeToFile(datafile, tostring(root))
        generateXMLData5unif_data(dataSet,str(plot2))
        writeToFile(datafile, tostring(root))
        generateXMLData5unif_data(dataSet,str(plot3))
        writeToFile(datafile, tostring(root))
        generateXMLData5unif_data(dataSet,str(plot4))
        writeToFile(datafile, tostring(root))
        generateXMLData5unif_data(dataSet,str(plot5))
        writeToFile(datafile, tostring(root))
	generateXMLData5unif_data(dataSet,str(plot6))
        writeToFile(datafile, tostring(root))



if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
	datafile=fname+"_Data.xml"
	xml_from_excel5(fname)
