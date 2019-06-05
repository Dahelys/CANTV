--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.6
-- Dumped by pg_dump version 9.4.6
-- Started on 2016-11-06 14:53:24 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11861)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2007 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 173 (class 1259 OID 16676)
-- Name: spl_sise; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE spl_sise (
    registro character varying(50) NOT NULL,
    orden_servicio character varying(50),
    cliente character varying(100),
    identificador_metro character varying(50),
    tipo_servicio_metro character varying(50),
    tipo_plan_metro character varying(50),
    velocidad_metro character varying(50),
    central_circuito character varying(50),
    central character varying(50),
    nombre_central character varying(50),
    tipo_componente character varying(50),
    status_instalacion character varying(50),
    nombre_nodo character varying(50),
    tipo_nodo character varying(50),
    tipo_tarjeta character varying(50),
    nombre_tarjeta character varying(50),
    slot character varying(50),
    puerto character varying(50),
    id_reg regclass NOT NULL
);


ALTER TABLE spl_sise OWNER TO postgres;

--
-- TOC entry 2008 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN spl_sise.tipo_plan_metro; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN spl_sise.tipo_plan_metro IS '																																													';


--
-- TOC entry 174 (class 1259 OID 16684)
-- Name: spl_sise_id_reg_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE spl_sise_id_reg_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE spl_sise_id_reg_seq OWNER TO postgres;

--
-- TOC entry 2009 (class 0 OID 0)
-- Dependencies: 174
-- Name: spl_sise_id_reg_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE spl_sise_id_reg_seq OWNED BY spl_sise.id_reg;


--
-- TOC entry 1886 (class 2604 OID 16696)
-- Name: id_reg; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY spl_sise ALTER COLUMN id_reg SET DEFAULT nextval('spl_sise_id_reg_seq'::regclass);


--
-- TOC entry 1998 (class 0 OID 16676)
-- Dependencies: 173
-- Data for Name: spl_sise; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY spl_sise (registro, orden_servicio, cliente, identificador_metro, tipo_servicio_metro, tipo_plan_metro, velocidad_metro, central_circuito, central, nombre_central, tipo_componente, status_instalacion, nombre_nodo, dominio, tipo_nodo, tipo_tarjeta, nombre_tarjeta, slot, puerto, id_reg) FROM stdin;
\.


--
-- TOC entry 2010 (class 0 OID 0)
-- Dependencies: 174
-- Name: spl_sise_id_reg_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('spl_sise_id_reg_seq', 1, false);


--
-- TOC entry 1888 (class 2606 OID 16698)
-- Name: id_reg; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY spl_sise
    ADD CONSTRAINT id_reg PRIMARY KEY (id_reg);


--
-- TOC entry 2006 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-11-06 14:53:25 VET

--
-- PostgreSQL database dump complete
--

