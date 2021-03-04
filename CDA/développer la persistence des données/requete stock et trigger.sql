/*Exercice 2 - Requêtes d'interrogation sur la base Northwind*/
/*1 -Liste des contacts français*/
/*SELECT
  CompanyName,
  ContactName,
  ContactTitle,
  Phone
FROM
  northwind.customers
WHERE
  country = 'France';
  */
  /*2 -Produits vendus par le fournisseur «Exotic Liquids»:*/
  /*
  SELECT ProductName,UnitPrice
  FROM
  northwind.products
  Join suppliers on suppliers.SupplierID = products.SupplierID
  WHERE CompanyName='Exotic Liquids';
  */
  /*3 -Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant*/
  /*
SELECT CompanyName AS 'Fournisseurs', count(products.UnitsOnOrder) as 'Nbr produits'
FROM Suppliers
Join Products on Products.SupplierID = Suppliers.SupplierID
WHERE Country ='France'
GROUP BY CompanyName
ORDER BY COUNT('Nbr produits') desc;
*/
/*4 -Liste des clients Français ayant plus de 10 commandes*/
/*
SELECT CompanyName AS 'Client', COUNT(orders.CustomerID) AS 'Nbre commandes'
FROM customers
JOIN orders ON orders.CustomerID=customers.CustomerID
WHERE Shipcountry='France'
GROUP BY CompanyName
HAVING  count(orders.CustomerID) >10;
*/
/*5 -Liste des clients ayant un chiffre d’affaires > 30.000*/
/*
SELECT CompanyName AS 'Clients', SUM(UnitPrice*Quantity) AS 'CA', customers.Country AS 'Pays'
FROM customers
JOIN orders ON orders.CustomerID=customers.CustomerID
JOIN `order details` ON `order details`.OrderID=orders.OrderID
GROUP BY customers.CustomerID
HAVING SUM(UnitPrice*Quantity)>30000;
ORDER BY CA DESC;
*/
/*6 –Liste des pays dont les clients ont passé commande de produits fournis par «Exotic Liquids»*/
/*
SELECT customers.country AS 'pays'
FROM suppliers
JOIN products ON products.SupplierID=suppliers.SupplierID
JOIN `order details` ON  `order details`.ProductID=products.ProductID
JOIN orders ON orders.OrderID=`order details`.OrderID
JOIN customers ON customers.CustomerID=orders.CustomerID
WHERE suppliers.CompanyName = 'Exotic liquids';
GROUP BY pays;
*/
/*7 –Montant des ventes de 1997*/
/*
SELECT SUM(UnitPrice*Quantity) AS 'Montant ventes 97'
FROM `order details`
JOIN orders ON orders.OrderID=`order details`.OrderID
WHERE OrderDate BETWEEN '1997-01-01 00:00:00' AND '1997-12-31 00:00:00'
;
*/
/*8 –Montant des ventes de 1997 mois par mois*/
/*
SELECT MONTH(OrderDate) AS 'Mois 97',SUM(UnitPrice*Quantity) AS 'Montant ventes 97'
FROM `order details`
JOIN orders ON orders.OrderID=`order details`.OrderID
WHERE OrderDate BETWEEN '1997-01-01 00:00:00' AND '1997-12-31 00:00:00'
GROUP BY MONTH(OrderDate);
*/
/*9 –Depuis quelle date le client «Du monde entier» n’a plus commandé*/
/*
SELECT MAX(OrderDate)
FROM orders
JOIN customers ON customers.CustomerID=orders.CustomerID
WHERE CompanyName='Du monde entier';
*/
/*10 –Quel est le délai moyen de livraison en jours?*/
/*
SELECT round (AVG(datediff(ShippedDate, orderdate)), 0) AS 'Délai moyen de livraison en jours'
FROM orders
;
*/
/* 2-1 prcédure stockkée –Depuis quelle date le client «Du monde entier» n’a plus commandé*/
/*
DELIMITER |
DROP PROCEDURE IF EXISTS LAST_CO_DME;
CREATE PROCEDURE LAST_CO_DME () BEGIN
SELECT MAX(OrderDate) AS `Date de dernière commande`
FROM northwind.orders
JOIN northwind.customers ON northwind.customers.CustomerID=northwind.orders.CustomerID
WHERE CompanyName='Du monde entier'; END | CALL lAST_CO_DME;
*/
/*2-2 prcédure stockkée –Quel est le délai moyen de livraison en jours?*/
/*
delimiter |
DROP PROCEDURE IF EXISTS delai_livraisonmoy;
CREATE PROCEDURE delai_livraisonmoy() BEGIN
SELECT ROUND (AVG(DATEDIFF(ShippedDate, orderdate)), 0) AS 'Délai moyen de livraison en jours'
FROM northwind.orders; END | CALL delai_livraisonmoy;
*/
/*3 -Mise en place d'une règle de gestion*/
/*
delimiter |
CREATE TRIGGER gestion_fraistrans after INSERT ON northwind.`order details`
FOR EACH ROW
BEGIN
DECLARE pays_customers VARCHAR(50);
DECLARE pays_suppliers VARCHAR(50);
SET pays_customers = (SELECT Country FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN `order details` ON orders.OrderID = `order details`.OrderID
WHERE OrderID = new.OrderID AND ProductID = new.ProductID);

SET pays_suppliers= (SELECT Country FROM northwind.suppliers
JOIN products ON suppliers.SupplierID = products.SupplierID
JOIN `order details` ON products.ProductID = `order details`.ProductID
WHERE OrderID = new.OrderID AND ProductID = new.ProductID);

if pays_customers != pays_suppliers then
SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Le pays du fournisseur est différent du votre,
                        Vous êtes suceptible de payer des frais de transport important';
END IF;
END|
delimiter ;
*/

insert into northwind.`order details` ('OrderID', 'ProductID', 'UnitPrice', 'Quantity', 'Discount')
VALUES (10248, 27, 0, 0, 0)