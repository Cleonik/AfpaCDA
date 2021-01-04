/*exercice 1 éval Concevoir une base de données*/
CREATE TABLE Lecteur(
   lect_id BIGINT,
   lect_nom VARCHAR(30),
   lect_prénom VARCHAR(30),
   lect_adresse VARCHAR(60),
   lect_tel INT,
   lect_inscr DATE,
   PRIMARY KEY(lect_id)
);

CREATE TABLE Livre(
   liv_id BIGINT,
   liv_titre VARCHAR(40),
   liv_auteur VARCHAR(30),
   liv_editeur VARCHAR(30),
   liv_theme VARCHAR(20),
   liv_note VARCHAR(60),
   liv_rebus_date DATE,
   PRIMARY KEY(liv_id)
);

CREATE TABLE Emprunt(
   lect_id BIGINT,
   emprunt_date DATE,
   retour_date DATE,
   liv_id BIGINT NOT NULL,
   PRIMARY KEY(lect_id),
   FOREIGN KEY(lect_id) REFERENCES Lecteur(lect_id),
   FOREIGN KEY(liv_id) REFERENCES Livre(liv_id)
);





/*exercice 2
1)*/
CREATE TABLE Client(
   Client_id BIGINT,
   Client_nom VARCHAR(40),
   client_prenom VARCHAR(40),
   PRIMARY KEY(Client_id)
);

CREATE TABLE Commande(
   Cmd_id BIGINT,
   Cmd_date DATE,
   Cmd_montant CURRENCY,
   Client_id BIGINT NOT NULL,
   PRIMARY KEY(Cmd_id),
   FOREIGN KEY(Client_id) REFERENCES Client(Client_id)
);

CREATE TABLE Article(
   article_id BIGINT,
   article_desi VARCHAR(50),
   article_pu CURRENCY,
   PRIMARY KEY(article_id)
);

CREATE TABLE SeComposeDe(
   Cmd_id BIGINT,
   article_id BIGINT,
   Qte SMALLINT,
   TauxTva DECIMAL(2,2),
   PRIMARY KEY(Cmd_id, article_id),
   FOREIGN KEY(Cmd_id) REFERENCES Commande(Cmd_id),
   FOREIGN KEY(article_id) REFERENCES Article(article_id)
);
/*
2) les entitées Client, Commande et articles deviennent des tables de base de données.
l'action "Passe" en mcd disparait en MPD car il décrit simplement une action et sa cardinalité coté client montre que les client ne sont pas obligés d'avoir un compte client pour pouvoir passer commande alors que l'action de commandes est obligatoire si le client veut un article.
l'association "SeComposeDe" devient une table à par entière avec une quantité d'article ainsi que les taxes. Cette nouvelle table est associée aux tables "Commande" et "Article".

3)pour la table "SeComposeDe", elle a pour clé primaire et secondaire Cmd_id et article_id pour pouvoir faire le liens entre les tables "Commande" "Article" avec le ID de chacun.
La table "Article" a pour clé primaire Article_id car l'id de chaque articles est unique et ne permet alors aucun confusion au niveau serveur.
La table "Commande" a pour clé primaire Cmd_id car l'ID est unique. et à pour clé étrangère Client_id pour pour la lié avec la table "Client".
la table Client a pour clé primaire Cleint-id

*/