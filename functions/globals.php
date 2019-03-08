<?php
/*
 *  Usage: Contains all the global values , that will be commonly used in the application.
 *  Author: Ola Aboamer [o.aboamer@cern.ch]
*/

include_once "globals_functions.php";

// Get KIND OF PARTS IDs from DB
$resultArr = get_parts_kinds_set_globals();
//print_r($resultArr);
// Get KIND OF Conditions IDs from DB
$resultArr_kinds = get_conditions_kinds_set_globals();
//print_r($resultArr_kinds);
// Get part to part relations IDs from DB
$resultArr_p2pr = get_part_part_relns_set_globals();
//print_r($resultArr_p2pr);

/* Kind of parts Constants */
/*
 * GEM Detector ROOT
 * GEM Foil
 * GEM Readout PCB
 * GEM VFAT2
 * Generic GEM part
 * Generic GEM parent part
 * CAEN N1145 Scalar
 * ORTEC 935 CFD Discriminator
 * Lecroy 623A Discriminator
 * ORTEC 474 Timing Filter Amp
 * ORTEC 142PC Preamplifier
 * CAEN A422A Charge Sensitive Preamp
 * GEM HV Circuit
 * GEM Drift PCB
 * GEM Chamber
 * GEM Super Chamber
 * GEM Opto Hybrid
 * GEM AMC Gigabit Link Interface Board
 * GEM AMC13 Board
 * GEM Main Carrier HUB
 * GEM Micro TCA Crate
 * GEM Electronics Board  
 */
// 1st IDs
// GEM Detector ROOT
$ROOT_KIND_OF_PART_ID = $resultArr['GEM Detector ROOT'];
//Kind of part id for Chambers
//$CHAMBER_KIND_OF_PART_ID = "10000000000001719";
$CHAMBER_KIND_OF_PART_ID = $resultArr['GEM Chamber'];
//Kind of part id for Super Chambers
$SUPER_CHAMBER_KIND_OF_PART_ID = $resultArr['GEM Super Chamber'];
//Kind of part id for Drift boards
//$DRIFT_KIND_OF_PART_ID = "10000000000001599";
$DRIFT_KIND_OF_PART_ID = $resultArr['GEM Drift PCB'];
//Kind of part id for GEM Foils
//$FOIL_KIND_OF_PART_ID = "10000000000001659";
$FOIL_KIND_OF_PART_ID = $resultArr['GEM Foil'];
//Kind of part id for Readout boards
//$READOUT_KIND_OF_PART_ID = "10000000000001679";
$READOUT_KIND_OF_PART_ID = $resultArr['GEM Readout PCB'];
//$FRAME_KIND_OF_PART_ID = "10000000000001679";
$FRAME_KIND_OF_PART_ID = $resultArr['GEM External Frame'];
//Kind of part id for VFAT chips
//$VFAT_KIND_OF_PART_ID = "10000000000001699";
$VFAT_KIND_OF_PART_ID = $resultArr['GEM VFAT2'];
$VFAT3_KIND_OF_PART_ID = $resultArr['GEM VFAT3'];

//Kind of part id for Optohybrids
//$OPTOHYBRID_KIND_OF_PART_ID = "10000000000002399";
$OPTOHYBRID_KIND_OF_PART_ID = $resultArr['GEM Opto Hybrid'];
$OPTOHYBRID_V3_KIND_OF_PART_ID = $resultArr['GEM Opto Hybrid V3'];

//Kind of part id for AMCs
//$AMC_KIND_OF_PART_ID = "10000000000002419";
$AMC_KIND_OF_PART_ID = $resultArr['GEM AMC Gigabit Link Interface Board'];
$GEM_AMC_KIND_OF_PART_ID = $resultArr['GEM AMC'];

//Kind of part id for AMC13
//$AMC13_KIND_OF_PART_ID = "10000000000002439";
$AMC13_KIND_OF_PART_ID = $resultArr['GEM AMC13 Board'];
//Kind of part id for HUBs
//$HUB_KIND_OF_PART_ID = "10000000000002459";
$HUB_KIND_OF_PART_ID = $resultArr['GEM Main Carrier HUB'];
//Kind of part id for MicroTCAs
//$MICROTCA_KIND_OF_PART_ID = "10000000000002479";
$MICROTCA_KIND_OF_PART_ID = $resultArr['GEM Micro TCA Crate'];
//Kind of part id for GEBs
//$GEB_KIND_OF_PART_ID = "10000000000002799"; 
$GEB_KIND_OF_PART_ID = $resultArr['GEM Electronics Board'];
$GEB_NARROW_KIND_OF_PART_ID = $resultArr['GEM Electronics Board Narrow'];
$GEB_WIDE_KIND_OF_PART_ID = $resultArr['GEM Electronics Board Wide'];



$COOLING_PLATE_KIND_OF_PART_ID = $resultArr['GEM Cooling Plate'];
$TEMP_SENSOR_KIND_OF_PART_ID = $resultArr['GEM Temperature Sensor'];
$RADMON_SENSOR_KIND_OF_PART_ID = $resultArr['GEM Radmon Sensor'];

 
//Kind of part id for CEAN N1145
$CEANN1145_KIND_OF_PART_ID = $resultArr['CAEN N1145 Scalar'];
//Kind of part id for ORTEC 935
$ORTEC935_KIND_OF_PART_ID = $resultArr['ORTEC 935 CFD Discriminator'];
//Kind of part id for Lecroy 623A
$Lecroy623A_KIND_OF_PART_ID = $resultArr['Lecroy 623A Discriminator'];
//Kind of part id for ORTEC 474
$ORTEC474_KIND_OF_PART_ID = $resultArr['ORTEC 474 Timing Filter Amp'];
//Kind of part id for ORTEC 142PC
$ORTEC142PC_KIND_OF_PART_ID = $resultArr['ORTEC 142PC Preamplifier'];
//Kind of part id for CAEN A422A
$CAENA422A_KIND_OF_PART_ID = $resultArr['CAEN A422A Charge Sensitive Preamp'];


//2nd Names
//Kind of part name for Chambers
$CHAMBER_KIND_OF_PART_NAME = "GEM Chamber";
//Kind of part name for Super Chambers
$SUPER_CHAMBER_KIND_OF_PART_NAME = "GEM Super Chamber";
//Kind of part name for Drift boards
$DRIFT_KIND_OF_PART_NAME = "GEM Drift PCB";
//Kind of part name for GEM Foils
$FOIL_KIND_OF_PART_NAME = "GEM Foil";
//Kind of part name for Readout boards
$READOUT_KIND_OF_PART_NAME = "GEM Readout PCB";
//Kind of part name for Readout boards
$FRAME_KIND_OF_PART_NAME = "GEM External Frame";
//Kind of part name for VFAT chips
$VFAT_KIND_OF_PART_NAME = "GEM VFAT2";
$VFAT3_KIND_OF_PART_NAME = "GEM VFAT3";

//Kind of part name for Optohybrids

$OPTOHYBRID_KIND_OF_PART_NAME = "GEM Opto Hybrid";
$OPTOHYBRID_V3_KIND_OF_PART_NAME = "GEM Opto Hybrid V3";

//Kind of part name for AMCs
$AMC_KIND_OF_PART_NAME = "GEM AMC Gigabit Link Interface Board";
$GEM_AMC_KIND_OF_PART_NAME = "GEM AMC";

//Kind of part name for AMC13
$AMC13_KIND_OF_PART_NAME = "GEM AMC13 Board";
//Kind of part name for HUBs
$HUB_KIND_OF_PART_NAME = "GEM Main Carrier HUB";
//Kind of part name for MicroTCAs
$MICROTCA_KIND_OF_PART_NAME = "GEM Micro TCA Crate";
//Kind of part name for GEBs
$GEB_KIND_OF_PART_NAME = "GEM Electronics Board"; 
$GEB_NARROW_KIND_OF_PART_NAME = "GEM Electronics Board Narrow";
$GEB_WIDE_KIND_OF_PART_NAME = "GEM Electronics Board Wide";


$COOLING_PLATE_KIND_OF_PART_NAME = "GEM Cooling Plate";

$TEMP_SENSOR_KIND_OF_PART_NAME = "GEM Temperature Sensor";
$RADMON_SENSOR_KIND_OF_PART_NAME = "GEM Radmon Sensor";


//Kind of part name for CEAN N1145
$CEANN1145_KIND_OF_PART_NAME = 'CAEN N1145 Scalar';
//Kind of part name for ORTEC 935
$ORTEC935_KIND_OF_PART_NAME = 'ORTEC 935 CFD Discriminator';
//Kind of part name for Lecroy 623A
$Lecroy623A_KIND_OF_PART_NAME = 'Lecroy 623A Discriminator';
//Kind of part name for ORTEC 474
$ORTEC474_KIND_OF_PART_NAME = 'ORTEC 474 Timing Filter Amp';
//Kind of part name for ORTEC 142PC
$ORTEC142PC_KIND_OF_PART_NAME = 'ORTEC 142PC Preamplifier';
//Kind of part name for CAEN A422A
$CAENA422A_KIND_OF_PART_NAME = 'CAEN A422A Charge Sensitive Preamp';
 
 
/***********************************************/


// 1st Set of XML tags names Common between all parts
$SERIAL_NUMBER = "SERIAL_NUMBER";
$NAME_LABEL = "NAME_LABEL";
$LOCATION = "LOCATION";
$COMMENT_DESCRIPTION = "COMMENT_DESCRIPTION";
$BARCODE = "BARCODE";
$KIND_OF_PART = "KIND_OF_PART";
$RECORD_INSERTION_USER = "RECORD_INSERTION_USER";
$MANUFACTURER = "MANUFACTURER";

// 2nd Set of XML sub tags names for chamber 


/****SideBar list Tags IDs ****/

// Drift boards
$DRIFT_ID = "GEMDriftPCB";
//Kind of part name for GEM Foils
$FOIL_ID = "GEMFoil";
//Kind of part name for Readout boards
$READOUT_ID = "GEMReadoutPCB";
//Kind of part name for Readout boards
$FRAME_ID = "GEMExternalFrame";
//Kind of part name for VFAT chips
$VFAT_ID = "GEMVFAT";
//Kind of part name for Optohybrids
$OPTOHYBRID_ID = "GEMOptoHybrid";
//Kind of part name for AMCs
$AMC_ID = "GEMAMCGigabitLinkInterfaceBoard";
//Kind of part name for AMC13
$AMC13_ID = "GEMAMC13Board";
//Kind of part name for HUBs
$HUB_ID = "GEMMainCarrierHUB";
//Kind of part name for MicroTCAs
$MICROTCA_ID = "GEMMicroTCACrate";
//Kind of part name for GEBs
$GEB_ID = "GEMElectronicsBoard";

$COOLING_PLATE_ID = "GEMCoolingPlate";
$TEMP_SENSOR_ID = "GEMTempSensor";
$RADMON_SENSOR_ID = "GEMRadmonSensor";


/***** Part to Part Relationship IDs *****/
//$VFAT2_TO_GEB="10000000000005639";
$VFAT2_TO_GEB = $resultArr_p2pr['AutoAssigned: GEM VFAT2 --> GEM Electronics Board'];
$VFAT3_TO_GEB = $resultArr_p2pr['AutoAssigned: GEM VFAT3 --> GEM Electronics Board'];



$VFAT2_TO_GEB_NARROW = $resultArr_p2pr['GEM VFAT2 --> GEM Electronics Board Narrow'];
$VFAT3_TO_GEB_NARROW = $resultArr_p2pr['GEM VFAT3 --> GEM Electronics Board Narrow'];

$VFAT2_TO_GEB_WIDE = $resultArr_p2pr['GEM VFAT2 --> GEM Electronics Board Wide'];
$VFAT3_TO_GEB_WIDE = $resultArr_p2pr['GEM VFAT3 --> GEM Electronics Board Wide'];

//$OPTOHYBRID_TO_GEB="10000000000005239";
$OPTOHYBRID_TO_GEB = $resultArr_p2pr['AutoAssigned: GEM Opto Hybrid --> GEM Electronics Board'];
$OPTOHYBRID_TO_CHAMBER = $resultArr_p2pr['GEM Opto Hybrid --> GEM Chamber'];
$OPTOHYBRID_V3_TO_CHAMBER = $resultArr_p2pr['GEM Opto Hybrid V3 --> GEM Chamber'];


//$GEB_TO_READOUT="10000000000004839";
$GEB_TO_READOUT = $resultArr_p2pr['AutoAssigned: GEM Electronics Board --> GEM Readout PCB'];

//$READOUT_TO_CHAMBER="10000000000002000";
$READOUT_TO_CHAMBER = $resultArr_p2pr['AutoAssigned: GEM Readout PCB --> GEM Chamber'];

//$READOUT_TO_CHAMBER="10000000000002000";
$FRAME_TO_CHAMBER = $resultArr_p2pr['AutoAssigned: GEM External Frame --> GEM Chamber'];

//$FOIL_TO_CHAMBER="10000000000002001";
$FOIL_TO_CHAMBER = $resultArr_p2pr['AutoAssigned: GEM Foil --> GEM Chamber'];

//$DRIFT_TO_CHAMBER="10000000000002002";
$DRIFT_TO_CHAMBER = $resultArr_p2pr['AutoAssigned: GEM Drift PCB --> GEM Chamber'];

//
$CHAMBER_TO_SUPER_CHAMBER = $resultArr_p2pr['AutoAssigned: GEM Chamber --> GEM Detector ROOT'];

$GEB_NARROW_TO_CHAMBER = $resultArr_p2pr['GEM Electronics Board Narrow --> GEM Chamber'];

$GEB_WIDE_TO_CHAMBER = $resultArr_p2pr['GEM Electronics Board Wide --> GEM Chamber'];


$COOLING_PLATE_TO_CHAMBER = $resultArr_p2pr['GEM Cooling Plate --> GEM Chamber'];


$TEMP_SENSOR_TO_CHAMBER = $resultArr_p2pr['GEM Temperature Sensor --> GEM Chamber'];
$RADMON_SENSOR_TO_CHAMBER = $resultArr_p2pr['GEM Radmon Sensor --> GEM Chamber'];


/**
 * 
 * 
 * AutoAssigned: GEM Chamber --> GEM Detector ROOT
AutoAssigned: GEM Drift PCB --> GEM Chamber
AutoAssigned: GEM Drift PCB --> GEM Foil
AutoAssigned: GEM Electronics Board --> GEM Readout PCB
AutoAssigned: GEM Foil --> GEM Chamber
AutoAssigned: GEM Foil --> GEM Detector ROOT
AutoAssigned: GEM Foil --> GEM Foil
AutoAssigned: GEM Opto Hybrid --> GEM Electronics Board
AutoAssigned: GEM Readout PCB --> GEM Chamber
AutoAssigned: GEM Readout PCB --> GEM Detector ROOT
AutoAssigned: GEM Readout PCB --> GEM Foil
AutoAssigned: GEM VFAT --> GEM Readout PCB
AutoAssigned: GEM VFAT2 --> GEM Electronics Board
AutoAssigned: Generic GEM parent part --> GEM Detector ROOT
AutoAssigned: Generic GEM part --> Generic GEM parent part
GEMDetectorRoot-GEMDetectorRoot
 * 
 * **/


/****** Root part Information *****/
$ROOT_BARCODE= "CMS-GEM-ROOT";
$ROOT_KIND_OF_PART ="GEM Detector ROOT";
$ROOT_SERIAL_NUM="ROOT";
//Kind of part name for ROOT
$ROOT_KIND_OF_PART_NAME = "GEM Detector ROOT";
$ROOT_PART_ID = getROOT($ROOT_KIND_OF_PART_ID);

/**** Conditions Kinds IDs****/
 $TRACKING_CONDITION_ID = $resultArr_kinds['GEM Component Tracking Data'] ;
