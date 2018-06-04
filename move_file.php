<?php
	// connect and login to FTP server

	// Variables d'accès
	$ftp_server = "localhost";  // Adresse du serveur
	$ftp_server_port = "21";  // Port de connexion (par défaut 21 pour le FTP)
	$ftp_username = "user"; // Nom d'utilisateur pour la connexion
	$ftp_userpass = "user"; // Mot de passe pour la connexion

	$old_file = "depart/serverfile.txt";  // Fichier à envoyé sur le serveur
	$new_file = "arrivee/serverfile.txt"; // Nom du fichier sur le serveur à la réception


	// Connexion et login
	$ftp_conn = ftp_connect($ftp_server,$ftp_server_port) or die("Could not connect to $ftp_server");
	$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

	// try to move $old_file to $new_file
	if(ftp_rename($ftp_conn, $old_file, $new_file))
	{
	  echo "Renamed $old_file to $new_file";
	}
	else
	{
	  echo "Problem renaming $old_file to $new_file";
	}

	// close connection
	ftp_close($ftp_conn); // Fermeture de la connexion au serveur ftp
?>