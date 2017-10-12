--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.4
-- Dumped by pg_dump version 9.6.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

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
    phone integer NOT NULL,
    addressnum integer NOT NULL,
    addressst character varying(255) NOT NULL
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
    paid boolean
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
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: avmxgmcfweifyt
--

COPY customer (id, lastname, firstname, phone, addressnum, addressst) FROM stdin;
\.


--
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('customer_id_seq', 1, false);


--
-- Data for Name: package; Type: TABLE DATA; Schema: public; Owner: avmxgmcfweifyt
--

COPY package (id, packagename, packageprice, description) FROM stdin;
\.


--
-- Name: package_id_seq; Type: SEQUENCE SET; Schema: public; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('package_id_seq', 1, false);


--
-- Data for Name: sale; Type: TABLE DATA; Schema: public; Owner: avmxgmcfweifyt
--

COPY sale (id, packageid, customerid, totalcost, paid) FROM stdin;
\.


--
-- Name: sale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: avmxgmcfweifyt
--

SELECT pg_catalog.setval('sale_id_seq', 1, false);


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

