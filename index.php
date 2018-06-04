<?php
	// connect and login to FTP server

	// Variables d'accès
	$ftp_server = "localhost";  // Adresse du serveur
	$ftp_server_port = "21";  // Port de connexion (par défaut 21 pour le FTP)
	$ftp_username = "user"; // Nom d'utilisateur pour la connexion
	$ftp_userpass = "user"; // Mot de passe pour la connexion

	$fichier_envoye = "fichier_envoye.txt";  // Fichier à envoyé sur le serveur
	$fichier_recu = "serverfile.txt"; // Nom du fichier sur le serveur à la réception


	// Connexion et login
	$ftp_conn = ftp_connect($ftp_server,$ftp_server_port) or die("Could not connect to $ftp_server");
	$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

	// upload file
	if (ftp_put($ftp_conn, $fichier_recu, $fichier_envoye, FTP_ASCII))
	{
	  echo "Successfully uploaded $fichier_envoye.";  // Envoi éffectué avec succès
	}
	else
	{
	  echo "Error uploading $file."; // Echec lors de l'envoi
	}

	// close connection
	ftp_close($ftp_conn); // Fermeture de la connexion au serveur ftp
?>
