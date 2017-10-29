--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.4
-- Dumped by pg_dump version 9.6.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: teamact; Type: SCHEMA; Schema: -; Owner: avmxgmcfweifyt
--

CREATE SCHEMA teamact;


ALTER SCHEMA teamact OWNER TO avmxgmcfweifyt;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: customer; Type: TABLE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE TABLE customer (
    id integer NOT NULL,
    lastname character varying(255) NOT NULL,
    firstname character varying(255) NOT NULL,
    phone integer,
    address character varying(255)
);


ALTER TABLE customer OWNER TO avmxgmcfweifyt;

--
-- Name: customer_id_seq; Type: SEQUENCE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE SEQUENCE customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE customer_id_seq OWNER TO avmxgmcfweifyt;

--
-- Name: customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: avmxgmcfweifyt
--

ALTER SEQUENCE customer_id_seq OWNED BY customer.id;


--
-- Name: package; Type: TABLE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE TABLE package (
    id integer NOT NULL,
    packagename character varying(255) NOT NULL,
    packageprice integer NOT NULL,
    num_songs integer,
    video_length text,
    description text
);


ALTER TABLE package OWNER TO avmxgmcfweifyt;

--
-- Name: package_id_seq; Type: SEQUENCE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE SEQUENCE package_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE package_id_seq OWNER TO avmxgmcfweifyt;

--
-- Name: package_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: avmxgmcfweifyt
--

ALTER SEQUENCE package_id_seq OWNED BY package.id;


--
-- Name: sale; Type: TABLE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE TABLE sale (
    id integer NOT NULL,
    packageid integer,
    customerid integer,
    totalcost integer NOT NULL,
    paid boolean,
    video character varying(255)
);


ALTER TABLE sale OWNER TO avmxgmcfweifyt;

--
-- Name: sale_id_seq; Type: SEQUENCE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE SEQUENCE sale_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sale_id_seq OWNER TO avmxgmcfweifyt;

--
-- Name: sale_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: avmxgmcfweifyt
--

ALTER SEQUENCE sale_id_seq OWNED BY sale.id;


--
-- Name: user_account; Type: TABLE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE TABLE user_account (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    is_admin boolean
);


ALTER TABLE user_account OWNER TO avmxgmcfweifyt;

--
-- Name: user_account_id_seq; Type: SEQUENCE; Schema: public; Owner: avmxgmcfweifyt
--

CREATE SEQUENCE user_account_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_account_id_seq OWNER TO avmxgmcfweifyt;

--
-- Name: user_account_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: avmxgmcfweifyt
--

ALTER SEQUENCE user_account_id_seq OWNED BY user_account.id;


SET search_path = teamact, pg_catalog;

--
-- Name: scriptures; Type: TABLE; Schema: teamact; Owner: avmxgmcfweifyt
--

CREATE TABLE scriptures (
    id integer NOT NULL,
    book text,
    chapter integer,
    verse integer,
    content character varying(256)
);


ALTER TABLE scriptures OWNER TO avmxgmcfweifyt;

--
-- Name: scriptures_id_seq; Type: SEQUENCE; Schema: teamact; Owner: avmxgmcfweifyt
--

CREATE SEQUENCE scriptures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE scriptures_id_seq OWNER TO avmxgmcfweifyt;

--
-- Name: scriptures_id_seq; Type: SEQUENCE OWNED BY; Schema: teamact; Owner: avmxgmcfweifyt
--

ALTER SEQUENCE scriptures_id_seq OWNED BY scriptures.id;


SET search_path = public, pg_catalog;

--
-- Name: customer id; Type: DEFAULT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY customer ALTER COLUMN id SET DEFAULT nextval('customer_id_seq'::regclass);


--
-- Name: package id; Type: DEFAULT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY package ALTER COLUMN id SET DEFAULT nextval('package_id_seq'::regclass);


--
-- Name: sale id; Type: DEFAULT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY sale ALTER COLUMN id SET DEFAULT nextval('sale_id_seq'::regclass);


--
-- Name: user_account id; Type: DEFAULT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY user_account ALTER COLUMN id SET DEFAULT nextval('user_account_id_seq'::regclass);


SET search_path = teamact, pg_catalog;

--
-- Name: scriptures id; Type: DEFAULT; Schema: teamact; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY scriptures ALTER COLUMN id SET DEFAULT nextval('scriptures_id_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: avmxgmcfweifyt
--

COPY customer (id, lastname, firstname, phone, address) FROM stdin;
3	Noorda	Sam	2082517778	1710 Satterfield
4	Nield	Bryton	2082205015	420 Callaway
6	Monson	Bailee	\N	\N
7	Campbell	Hanna	2082217080	\N
8	Pahl	Jantzen	2087054515	\N
10	Pahl	Bayley	2087052746	\N
11	Evans	Shelby	2085300081	\N
12	Bailey	Hope	2087056119	\N
13	Clark	Michelle	\N	\N
14	Preston	Christi	\N	\N
15	Reese	Emily	2083515844	\N
17	Weston	Kayla	\N	\N
18	Hendricks	Meghan	\N	\N
19	Whiting	Ashley	\N	\N
20	Landinez	Jose	\N	\N
9	Sawyer	Ashley	2083602010	Idaho Falls
1	Fisher	Ben	2087760707	111 W 7 S APT 909
2	Fisher	Casslyn	2083137128	111 W 7 S APT 909
24	Hensley	Caleb	2082441972	241 Steiner Ave #1
16	Fisher	Dallin	2083171623	Arizona
\.


--
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('customer_id_seq', 28, true);


--
-- Data for Name: package; Type: TABLE DATA; Schema: public; Owner: avmxgmcfweifyt
--

COPY package (id, packagename, packageprice, num_songs, video_length, description) FROM stdin;
1	Basic	399	1	2.5-3.5 minutes	This package includes up to 3 hours of coverage, and a discount at Destinations Inn.
2	Standard	549	1	2.5-3.5 minutes	This package includes up to 6 hours of coverage, and a discount at Destinations Inn.
3	Deluxe	649	2	5-7 minutes	This package includes up to 6 hours of coverage, and a discount at Destinations Inn.
4	Super Deluxe	829	3	10 minutes	This package includes up to 9 hours of coverage for a Bridal Session, Wedding Ceremony, and Reception. It also includes a discount at Destinations Inn.
\.


--
-- Name: package_id_seq; Type: SEQUENCE SET; Schema: public; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('package_id_seq', 4, true);


--
-- Data for Name: sale; Type: TABLE DATA; Schema: public; Owner: avmxgmcfweifyt
--

COPY sale (id, packageid, customerid, totalcost, paid, video) FROM stdin;
7	3	10	475	t	\N
11	3	4	0	t	\N
13	1	20	200	t	\N
17	2	17	150	t	\N
3	4	9	300	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/CSRy20Ai5R0?rel=0" frameborder="0" allowfullscreen></iframe>
1	3	6	450	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/MTc4AEj150c?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
15	3	15	250	f	<iframe width="560" height="315" src="https://www.youtube.com/embed/AaPfj9FYcEM?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
16	3	16	0	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/cs8F2NYnPH0?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
10	2	7	400	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/c-0EWuUkvh8?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
6	3	8	450	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/hHm30XHTw7c?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
2	3	19	250	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/i8RK9E0TCiQ?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
8	3	18	500	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/gT41G7zoSPM?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
9	3	11	300	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/NyRQZUcdoXw?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
14	2	14	200	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/xfcAS9qKNVU?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
12	3	13	500	t	<iframe width="560" height="315" src="https://www.youtube.com/embed/uegEJue4qRU?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
5	1	12	200	f	<iframe width="560" height="315" src="https://www.youtube.com/embed/eBzI-xcagL0?rel=0" frameborder="0" class="video" allowfullscreen></iframe>
\.


--
-- Name: sale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('sale_id_seq', 17, true);


--
-- Data for Name: user_account; Type: TABLE DATA; Schema: public; Owner: avmxgmcfweifyt
--

COPY user_account (id, username, password, is_admin) FROM stdin;
1	admin	cs313	t
2	fizhy37	ben	t
3	frowhite	password	t
4	ben	$2y$10$VkWCprvh9iv.TOkXqnZkWO7muQ8IPkEZ2aT1c0KC2MrM7/A7nvlq.	f
\.


--
-- Name: user_account_id_seq; Type: SEQUENCE SET; Schema: public; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('user_account_id_seq', 4, true);


SET search_path = teamact, pg_catalog;

--
-- Data for Name: scriptures; Type: TABLE DATA; Schema: teamact; Owner: avmxgmcfweifyt
--

COPY scriptures (id, book, chapter, verse, content) FROM stdin;
1	John	1	5	And the light shineth in darkness; and the darkness comprehended it not.
2	Doctrine and Covenants	88	49	The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.
3	Doctrine and Covenants	93	28	He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.
4	Mosiah	16	9	He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.
\.


--
-- Name: scriptures_id_seq; Type: SEQUENCE SET; Schema: teamact; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('scriptures_id_seq', 4, true);


SET search_path = public, pg_catalog;

--
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (id);


--
-- Name: package package_pkey; Type: CONSTRAINT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY package
    ADD CONSTRAINT package_pkey PRIMARY KEY (id);


--
-- Name: sale sale_pkey; Type: CONSTRAINT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY sale
    ADD CONSTRAINT sale_pkey PRIMARY KEY (id);


--
-- Name: user_account user_account_pkey; Type: CONSTRAINT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY user_account
    ADD CONSTRAINT user_account_pkey PRIMARY KEY (id);


SET search_path = teamact, pg_catalog;

--
-- Name: scriptures scriptures_pkey; Type: CONSTRAINT; Schema: teamact; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY scriptures
    ADD CONSTRAINT scriptures_pkey PRIMARY KEY (id);


SET search_path = public, pg_catalog;

--
-- Name: sale sale_customerid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY sale
    ADD CONSTRAINT sale_customerid_fkey FOREIGN KEY (customerid) REFERENCES customer(id);


--
-- Name: sale sale_packageid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: avmxgmcfweifyt
--

ALTER TABLE ONLY sale
    ADD CONSTRAINT sale_packageid_fkey FOREIGN KEY (packageid) REFERENCES package(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: avmxgmcfweifyt
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO avmxgmcfweifyt;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO avmxgmcfweifyt;


--
-- PostgreSQL database dump complete
--

