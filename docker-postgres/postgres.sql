--
-- PostgreSQL database dump
--

-- Dumped from database version 15.0 (Debian 15.0-1.pgdg110+1)
-- Dumped by pg_dump version 15.0 (Debian 15.0-1.pgdg110+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: client; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.client (
    "idClient" integer NOT NULL,
    nom character varying(255) NOT NULL,
    prenom character varying(255) NOT NULL,
    login character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    mail character varying(255) NOT NULL
);


ALTER TABLE public.client OWNER TO admin;

--
-- Name: client_idClient_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public."client_idClient_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."client_idClient_seq" OWNER TO admin;

--
-- Name: client_idClient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public."client_idClient_seq" OWNED BY public.client."idClient";


--
-- Name: commande; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.commande (
    "idCommande" integer NOT NULL,
    date date NOT NULL,
    statut character varying(255) NOT NULL,
    montant double precision NOT NULL,
    "idClient" integer NOT NULL
);


ALTER TABLE public.commande OWNER TO admin;

--
-- Name: commande_idCommande_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public."commande_idCommande_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."commande_idCommande_seq" OWNER TO admin;

--
-- Name: commande_idCommande_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public."commande_idCommande_seq" OWNED BY public.commande."idCommande";


--
-- Name: commandeproduit; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.commandeproduit (
    "idCommande" integer NOT NULL,
    "idProduit" integer NOT NULL,
    quantite integer NOT NULL
);


ALTER TABLE public.commandeproduit OWNER TO admin;

--
-- Name: produit; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.produit (
    "idProduit" integer NOT NULL,
    nom character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    prix integer NOT NULL,
    image character varying(255) NOT NULL
);


ALTER TABLE public.produit OWNER TO admin;

--
-- Name: produit_idProduit_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public."produit_idProduit_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."produit_idProduit_seq" OWNER TO admin;

--
-- Name: produit_idProduit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public."produit_idProduit_seq" OWNED BY public.produit."idProduit";


--
-- Name: client idClient; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.client ALTER COLUMN "idClient" SET DEFAULT nextval('public."client_idClient_seq"'::regclass);


--
-- Name: commande idCommande; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.commande ALTER COLUMN "idCommande" SET DEFAULT nextval('public."commande_idCommande_seq"'::regclass);


--
-- Name: produit idProduit; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.produit ALTER COLUMN "idProduit" SET DEFAULT nextval('public."produit_idProduit_seq"'::regclass);


--
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.client ("idClient", nom, prenom, login, password, mail) FROM stdin;
\.


--
-- Data for Name: commande; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.commande ("idCommande", date, statut, montant, "idClient") FROM stdin;
\.


--
-- Data for Name: commandeproduit; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.commandeproduit ("idCommande", "idProduit", quantite) FROM stdin;
\.


--
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.produit ("idProduit", nom, description, prix, image) FROM stdin;
1	Chocolat Blanc	Délicieux chocolat blanc	8	blanc.jpeg
2	Chocolat au Lait	Un chocolat au lait à vous faire tomber	8	lait.jpg
3	Chocolat Noir	Puissant chocolat noir	7	noir.jpg
4	Le Morelliie	Un arômes délicats de café, un excellent chocolat noir, quoi de mieux pour vous maintenir éveillé toute la journée	15	morelliie.jpg
5	M&M'Sir	Chocolat au lait pour rendre vos M&M's plus craquant	12	m&ms.jpeg
6	VanillaChoc	La classique qui fait plaisir, chocolat blanc et vanille	11	vanille.jpeg
8	Le Crunchy	Chocolat au lait et noisettes, de quoi vous faire craquer	11	noisette.jpg
10	Daim'kerque	Chocolat noir et Daim, un combo foudroyant	14	daim.jpg
7	Caramilky	Chocolat au lait et caramel beurre salé, la petite touche de gourmandise	13	caramel.jpeg
9	ChocoPeanuts	Chocolat noir, chocolat au lait, cacahuète, explosion de saveurs garantie	12	cacahètes.jpg
\.


--
-- Name: client_idClient_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public."client_idClient_seq"', 1, false);


--
-- Name: commande_idCommande_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public."commande_idCommande_seq"', 1, false);


--
-- Name: produit_idProduit_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public."produit_idProduit_seq"', 1, false);


--
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY ("idClient");


--
-- Name: commande commande_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT commande_pkey PRIMARY KEY ("idCommande");


--
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY ("idProduit");


--
-- Name: commande commande_idClient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT "commande_idClient_fkey" FOREIGN KEY ("idClient") REFERENCES public.client("idClient") ON DELETE CASCADE;


--
-- Name: commandeproduit commandeproduit_idCommande_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.commandeproduit
    ADD CONSTRAINT "commandeproduit_idCommande_fkey" FOREIGN KEY ("idCommande") REFERENCES public.commande("idCommande") ON DELETE CASCADE;


--
-- Name: commandeproduit commandeproduit_idProduit_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.commandeproduit
    ADD CONSTRAINT "commandeproduit_idProduit_fkey" FOREIGN KEY ("idProduit") REFERENCES public.produit("idProduit") ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

