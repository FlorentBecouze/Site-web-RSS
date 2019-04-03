CREATE TABLE TAdmin(id int(11),
					login varchar(200),
					mdp varchar(200));

INSERT INTO TAdmin VALUES(0, "root", "$2y$10$UAr2cVlAlKyxRlnkbds1re/P6Dulh87SdH5JXwV4.2ZOsg9xACU4O");


CREATE TABLE TSites(url varchar(500),
					name varchar(150),
					CONSTRAINT CPSites PRIMARY KEY(name) );

INSERT INTO TSites VALUES("https://www.01net.com/rss/info/flux-rss/flux-toutes-les-actualites/", "01Net");
INSERT INTO TSites VALUES("https://hitek.fr/rss", "HiTeck");
INSERT INTO TSites VALUES("https://www.lemonde.fr/rss/une.xml", "Le Monde");



