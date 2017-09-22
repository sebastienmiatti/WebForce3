-- Voir toutes les BDD :
SHOW DATABASES;

-- Supprimer une BDD :
DROP DATABASE nom_de_la_bdd;

-- se connecter à une BDD :
USE jeudi;

-- Voir les tables de la BDD :
SHOW TABLES;

-- Créé une nouvelle BDD :
CREATE DATABASE nom_de_la_bdd;

-- Afficher toutes les infos de tout les employes :
SELECT * FROM employes;

-- Afficher les employes(nom, prenom) + salaire
SELECT prenom, nom, salaire FROM employes;

-- Afficher tous les services de mon entreprise;
SELECT service FROM employes;

-- Afficher tous les services de mon entreprises
SELECT DISTINCT service FROM employes;

-- Afficher tous les employes
SELECT prenom, nom FROM employes WHERE service = 'informatique';

--Afficher les employes qui ne sont pas du service informatique:
SELECT prenom, nom FROM employes WHERE service != 'informatique';

-- Afficher les employes qui gagnent un salaire supérieur à 2000€:
SELECT prenom, nom, salaire FROM employes WHERE salaire > 2000;

-- Combien de personne gagnent moin de 2000€ :  (compte les résultat de la colonne)
SELECT count(*) FROM employes WHERE salaire <= 2000;

-- AS : permet de créé un alias
SELECT COUNT(*) AS somme FROM employes WHERE salaire <= 2000;

-- Afficher la masse salariale anuelle de mon entreprise:(tout dépense)
SELECT SUM(salaire*12) FROM employes;

-- Avec Like, le % signifie 'peu importe ce qui suit, ou peu importe ce qui précède'.
SELECT prenom FROM employes WHERE prenom LIKE 'a%';

SELECT prenom FROM employes WHERE prenom LIKE '%a%';

-- Afficher tous les employés dans l'ordre de celui qui gagnent le plus à celui qui gagne le moins.
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC;

-- Afficher les 3 employes qui gagnent le plus
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,3;

--Afficher la personne qui gagne le plus petit salaire
SELECT prenom, nom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

SELECT salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

SELECT MIN(salaire) FROM employes;

-- Afficher le prenom de la personne que gagne le plus petit salaire en utilisant MIN()
 SELECT prenom, salaire FROM employes WHERE salaire = (SELECT min(salaire)FROM employes);

-- Afficher tout les employes des service informatique et commercial:
SELECT prenom, nom, service FROM employes WHERE (service = 'informatique' || service = 'commercial');

SELECT prenom, nom, service FROM employes WHERE service IN('informatique','commercial');

-- Afficher tout les employes hors des services informatique et commercial:

SELECT prenom, nom, service FROM employes WHERE service != 'informatique' AND service != 'commercial';

SELECT prenom, nom, service FROM employes WHERE service NOT IN ('informatique', 'commercial');

-- Afficher le nombre de femmes dans l'entreprise :
SELECT count(*) FROM employes WHERE sexe='f';

-- Afficher le nombre d'employés par sexe:
SELECT sexe, count(*) FROM employes GROUP BY sexe;

-- Le nombre de salarié du service informatique ou commercial :
SELECT COUNT(*) FROM employes WHERE service IN('commercial', 'informatique') GROUP BY service;

SELECT service, count(*) FROM employes GROUP BY service Having service IN('informatique','commercial');


----------------------
-- INSERTION EN BDD --
----------------------

INSERT INTO employes (prenom, nom, service, sexe, salaire, date_embauche) VALUES ('sebastien', 'miatti', 'informatique', 'm', 5001, CURDATE()); -- now() timestamp()

----------------------
-- MODIFICATION BDD --
----------------------

-- On modifie tous les salaire de tous les employés
UPDATE employes set salaire = 3000;

-- On modifie le salaire 'Julien'
UPDATE employes set salaire = 3500 WHERE prenom = 'sebastien';

UPDATE employes set salaire = 2800 WHERE id_employes = '991';

REPLACE INTO employes (id_employes, prenom, nom, service, salaire, date_embauche, sexe) VALUES (991, 'sebastien', 'miatti', 'informatique', 6000, CURDATE(), 'm');

UPDATE employes set service = 'marketing', salaire = 3200 WHERE id_employes = 547;

-- On augmente tout le monde  de 100€
UPDATE employes set salaire = salaire + 100;


---------------------
-- SUPPRESSION BDD --
---------------------

--On supprime l'employes 991
DELETE FROM employes WHERE id_employes = 991;
