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


CREATE SEQUENCE spl_sise_id_reg_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE spl_sise_id_reg_seq OWNER TO postgres;

ALTER SEQUENCE spl_sise_id_reg_seq OWNED BY spl_sise.id_reg;

ALTER TABLE ONLY spl_sise ALTER COLUMN id_reg SET DEFAULT nextval('spl_sise_id_reg_seq'::regclass);

SELECT pg_catalog.setval('spl_sise_id_reg_seq', 1, false);


ALTER TABLE ONLY spl_sise
    ADD CONSTRAINT id_reg PRIMARY KEY (id_reg);
