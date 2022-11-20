-- Adminer 4.8.1 PostgreSQL 15.1 (Debian 15.1-1.pgdg110+1) dump

DROP TABLE IF EXISTS "Client";
DROP SEQUENCE IF EXISTS "Client_idClient_seq";
CREATE SEQUENCE "Client_idClient_seq" INCREMENT  MINVALUE  MAXVALUE  CACHE ;

CREATE TABLE "public"."Client" (
    "idClient" integer DEFAULT nextval('"Client_idClient_seq"') NOT NULL,
    "nom" character varying(255) NOT NULL,
    "prenom" character varying(255) NOT NULL,
    "login" character varying(255) NOT NULL,
    "password" character varying(255) NOT NULL,
    "mail" character varying(255) NOT NULL,
    CONSTRAINT "Client_pkey" PRIMARY KEY ("idClient")
) WITH (oids = false);


DROP TABLE IF EXISTS "Commande";
DROP SEQUENCE IF EXISTS "Commande_idCommande_seq";
CREATE SEQUENCE "Commande_idCommande_seq" INCREMENT  MINVALUE  MAXVALUE  CACHE ;

CREATE TABLE "public"."Commande" (
    "idCommande" integer DEFAULT nextval('"Commande_idCommande_seq"') NOT NULL,
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
DROP SEQUENCE IF EXISTS "Produit_idProduit_seq";
CREATE SEQUENCE "Produit_idProduit_seq" INCREMENT  MINVALUE  MAXVALUE  CACHE ;

CREATE TABLE "public"."Produit" (
    "idProduit" integer DEFAULT nextval('"Produit_idProduit_seq"') NOT NULL,
    "nom" character varying(255) NOT NULL,
    "description" character varying(255) NOT NULL,
    "prix" integer NOT NULL,
    CONSTRAINT "Produit_pkey" PRIMARY KEY ("idProduit")
) WITH (oids = false);


ALTER TABLE ONLY "public"."Commande" ADD CONSTRAINT "Commande_idClient_fkey" FOREIGN KEY ("idClient") REFERENCES "Client"("idClient") ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."CommandeProduit" ADD CONSTRAINT "CommandeProduit_idCommande_fkey" FOREIGN KEY ("idCommande") REFERENCES "Commande"("idCommande") ON DELETE CASCADE NOT DEFERRABLE;
ALTER TABLE ONLY "public"."CommandeProduit" ADD CONSTRAINT "CommandeProduit_idProduit_fkey" FOREIGN KEY ("idProduit") REFERENCES "Produit"("idProduit") ON DELETE CASCADE NOT DEFERRABLE;

-- 2022-11-20 16:11:26.462723+00
