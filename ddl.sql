CREATE TABLE public.casos
(
    id bigint NOT NULL,
    estado character varying(2) NOT NULL,
    cidade character varying(250) NOT NULL,
    casos integer,
    obitos integer,
    data date NOT NULL,
    PRIMARY KEY (id)
);

ALTER TABLE public.casos
    OWNER to postgres;

CREATE SEQUENCE casos_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;
ALTER TABLE casos_id_seq OWNER TO postgres; 
ALTER TABLE casos ALTER COLUMN id SET DEFAULT nextval('casos_id_seq'::regclass);

CREATE INDEX idx_casos_cidade ON casos (cidade);