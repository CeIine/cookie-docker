-- Adminer 4.8.1 PostgreSQL 15.1 (Debian 15.1-1.pgdg110+1) dump

DROP TABLE IF EXISTS "Client";

CREATE TABLE "public"."Client" (
    "idClient" SERIAL,
    "nom" character varying(255) NOT NULL,
    "prenom" character varying(255) NOT NULL,
    "login" character varying(255) NOT NULL,
    "password" character varying(255) NOT NULL,
    "mail" character varying(255) NOT NULL,
    CONSTRAINT "Client_pkey" PRIMARY KEY ("idClient")
) WITH (oids = false);


DROP TABLE IF EXISTS "Commande";

CREATE TABLE "public"."Commande" (
    "idCommande" SERIAL,
    "date" date NOT NULL,
    "statut" character varying(255) NOT NULL,
    "montant" double precision NOT NULL,
    "idClient" integer NOT NULL,
    CONSTRAINT "Commande_pkey" PRIMARY KEY ("idCommande")
) WITH (oids = false);


DROP TABLE IF EXISTS "CommandeProduit";
CREATE TABLE "public"."CommandeProduit" (
    "idCommande" integer NOT NULL,
    "idProduit" integer NOT NULL,
    "quantite" integer NOT NULL
) WITH (oids = false);


DROP TABLE IF EXISTS "Produit";

CREATE TABLE "public"."Produit" (
    "idProduit" SERIAL,
    "nom" character varying(255) NOT NULL,
    "description" character varying(255) NOT NULL,
    "prix" integer NOT NULL,
    "image" character varying(255) NOT NULL,
    CONSTRAINT "Produit_pkey" PRIMARY KEY ("idProduit")
) WITH (oids = false);


ALTER TABLE ONLY "public"."Commande" ADD CONSTRAINT "Commande_idClient_fkey" FOREIGN KEY ("idClient") REFERENCES "Client"("idClient") ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."CommandeProduit" ADD CONSTRAINT "CommandeProduit_idCommande_fkey" FOREIGN KEY ("idCommande") REFERENCES "Commande"("idCommande") ON DELETE CASCADE NOT DEFERRABLE;
ALTER TABLE ONLY "public"."CommandeProduit" ADD CONSTRAINT "CommandeProduit_idProduit_fkey" FOREIGN KEY ("idProduit") REFERENCES "Produit"("idProduit") ON DELETE CASCADE NOT DEFERRABLE;

-- 2022-11-20 17:47:35.107198+00
