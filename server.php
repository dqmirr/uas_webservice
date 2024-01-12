<?php

require_once('vendor/econea/nusoap/src/nusoap.php');

require 'data.php';

$server = new nusoap_server(); // Create a instance for nusoap server

$server->configureWSDL("Soap Demo","urn:soapdemo"); // Configure WSDL file
$server->soap_defencoding = 'utf-8';
$server->encode_utf8 = false;
$server->decode_utf8 = false;

$server->register(
	"cekStatusBayar", // name of function
	array("name"=>"xsd:string"),  // inputs
	array("return"=>"xsd:string")   // outputs
);
$server->register(
    "getDaftarMahasiswaBelumBayar",
    array("name"=>"xsd:string"),
    array("return"=>"xsd:string"),

);

$server->service(file_get_contents("php://input"));