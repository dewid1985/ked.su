BEGIN ;
-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- pgModeler  version: 0.8.0-alpha2
-- PostgreSQL version: 9.4
-- Project Site: pgmodeler.com.br
-- Model Author: ---

SET check_function_bodies = false;
-- ddl-end --


-- Database creation must be done outside an multicommand file.
-- These commands were put in this file only for convenience.
-- -- object: new_database | type: DATABASE --
-- -- DROP DATABASE new_database;
-- CREATE DATABASE new_database
-- ;
-- -- ddl-end --
--

-- object: location | type: SCHEMA --
-- DROP SCHEMA location;
CREATE SCHEMA location;
-- ddl-end --

-- object: companies | type: SCHEMA --
-- DROP SCHEMA companies;
CREATE SCHEMA companies;
-- ddl-end --

-- object: users | type: SCHEMA --
-- DROP SCHEMA users;
CREATE SCHEMA users;
-- ddl-end --

-- object: admin | type: SCHEMA --
-- DROP SCHEMA admin;
CREATE SCHEMA admin;
-- ddl-end --

SET search_path TO pg_catalog,public,location,companies,users,admin;
-- ddl-end --

-- object: location.country | type: TABLE --
-- DROP TABLE location.country;
CREATE TABLE location.country(
	id serial,
	name varchar(64) NOT NULL,
	CONSTRAINT pk__country PRIMARY KEY (id)

);
-- ddl-end --
-- object: location.region | type: TABLE --
-- DROP TABLE location.region;
CREATE TABLE location.region(
	id serial,
	country_id integer NOT NULL,
	name varchar(256) NOT NULL,
	CONSTRAINT pk__region PRIMARY KEY (id)

);
-- ddl-end --
-- object: location.city | type: TABLE --
-- DROP TABLE location.city;
CREATE TABLE location.city(
	id serial,
	country_id integer NOT NULL,
	region_id integer NOT NULL,
	name varchar(256) NOT NULL,
	CONSTRAINT pk__city PRIMARY KEY (id)

);
-- ddl-end --
-- object: companies.company | type: TABLE --
-- DROP TABLE companies.company;
CREATE TABLE companies.company(
	id serial,
	name varchar(256),
	site varchar(128),
	description text,
	logo boolean,
	company_phone varchar,
	status smallint NOT NULL,
	opf_company_id integer,
	worker_count_id integer,
	city_id integer,
	company_type_id integer,
	CONSTRAINT pk__company PRIMARY KEY (id)

);
-- ddl-end --
-- object: companies.company_opf | type: TABLE --
-- DROP TABLE companies.company_opf;
CREATE TABLE companies.company_opf(
	id serial,
	name varchar(64),
	description varchar(512),
	CONSTRAINT fk__opf_company PRIMARY KEY (id)

);
-- ddl-end --
-- object: companies.worker_count | type: TABLE --
-- DROP TABLE companies.worker_count;
CREATE TABLE companies.worker_count(
	id serial,
	name varchar(128),
	description varchar(256),
	CONSTRAINT pk__worker_count PRIMARY KEY (id)

);
-- ddl-end --
-- object: index__opf_company_name | type: INDEX --
-- DROP INDEX companies.index__opf_company_name;
CREATE INDEX index__opf_company_name ON companies.company_opf
USING btree
(
	name ASC NULLS LAST
);
-- ddl-end --

-- object: index_opf_company_name | type: INDEX --
-- DROP INDEX companies.index_opf_company_name;
CREATE INDEX index_opf_company_name ON companies.worker_count
USING btree
(
	name ASC NULLS LAST
);
-- ddl-end --

-- object: companies.company_type | type: TABLE --
-- DROP TABLE companies.company_type;
CREATE TABLE companies.company_type(
	id serial,
	name varchar(128),
	description varchar(255),
	CONSTRAINT fk__companyes_company_type PRIMARY KEY (id)

);
-- ddl-end --
-- object: index__company_type_descrioption | type: INDEX --
-- DROP INDEX companies.index__company_type_descrioption;
CREATE INDEX index__company_type_descrioption ON companies.company_type
USING btree
(
	name ASC NULLS LAST
);
-- ddl-end --

-- object: index__company_name | type: INDEX --
-- DROP INDEX companies.index__company_name;
CREATE INDEX index__company_name ON companies.company
USING btree
(
	name ASC NULLS LAST
);
-- ddl-end --

-- object: index__company_site | type: INDEX --
-- DROP INDEX companies.index__company_site;
CREATE INDEX index__company_site ON companies.company
USING btree
(
	site ASC NULLS LAST
);
-- ddl-end --

-- object: users.user | type: TABLE --
-- DROP TABLE users.user;
CREATE TABLE users.user(
	id serial,
	type_authorization_id integer NOT NULL,
	token varchar(256) NOT NULL,
	password varchar(256) NOT NULL,
	status smallint NOT NULL,
	CONSTRAINT pk__user PRIMARY KEY (id)

);
-- ddl-end --
-- object: users.user_data | type: TABLE --
-- DROP TABLE users.user_data;
CREATE TABLE users.user_data(
	id serial,
	user_id integer NOT NULL,
	last_name varchar(256) NOT NULL,
	first_name varchar(256) NOT NULL,
	middle_name varchar(256) NOT NULL,
	phone varchar(15) NOT NULL,
	email varchar(256) NOT NULL,
	CONSTRAINT pk__user_data PRIMARY KEY (id),
	CONSTRAINT uq__user_data_email UNIQUE (email)

);
-- ddl-end --
-- object: ltree | type: EXTENSION --
-- -- DROP EXTENSION ltree CASCADE;
-- CREATE EXTENSION ltree
-- WITH SCHEMA public;
-- -- ddl-end --

-- object: users.role | type: TABLE --
-- DROP TABLE users.role;
CREATE TABLE users.role(
	id serial,
	role public.ltree,
	CONSTRAINT pk__role PRIMARY KEY (id)

);
-- ddl-end --
-- object: users.role_dimension | type: TABLE --
-- DROP TABLE users.role_dimension;
CREATE TABLE users.role_dimension(
	id serial,
	role_id integer,
	user_id integer,
	CONSTRAINT pk__user_dimension PRIMARY KEY (id)

);
-- ddl-end --
-- object: index__user_data_phone | type: INDEX --
-- DROP INDEX users.index__user_data_phone;
CREATE INDEX index__user_data_phone ON users.user_data
USING btree
(
	phone ASC NULLS LAST
);
-- ddl-end --

-- object: companies.company_dimension | type: TABLE --
-- DROP TABLE companies.company_dimension;
CREATE TABLE companies.company_dimension(
	id serial,
	user_id integer,
	user_post_id bigint NOT NULL,
	company_id integer,
	CONSTRAINT pk__company_dimension PRIMARY KEY (id)

);
-- ddl-end --
-- object: companies.post | type: TABLE --
-- DROP TABLE companies.post;
CREATE TABLE companies.post(
	id serial,
	name varchar(256),
	CONSTRAINT pk__companies_post PRIMARY KEY (id)

);
-- ddl-end --
-- object: admin.users | type: TABLE --
-- DROP TABLE admin.users;
CREATE TABLE admin.users(
	id serial,
	login varchar(256),
	password varchar(256),
	email varchar(256),
	CONSTRAINT pk__admin_users PRIMARY KEY (id),
	CONSTRAINT uq__admin_users_email UNIQUE (email),
	CONSTRAINT uq__admin_users_login UNIQUE (login)

);
-- ddl-end --
-- object: fk__location_region_country | type: CONSTRAINT --
-- ALTER TABLE location.region DROP CONSTRAINT fk__location_region_country;
ALTER TABLE location.region ADD CONSTRAINT fk__location_region_country FOREIGN KEY (country_id)
REFERENCES location.country (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__location_city_country | type: CONSTRAINT --
-- ALTER TABLE location.city DROP CONSTRAINT fk__location_city_country;
ALTER TABLE location.city ADD CONSTRAINT fk__location_city_country FOREIGN KEY (country_id)
REFERENCES location.country (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__location_city_region | type: CONSTRAINT --
-- ALTER TABLE location.city DROP CONSTRAINT fk__location_city_region;
ALTER TABLE location.city ADD CONSTRAINT fk__location_city_region FOREIGN KEY (region_id)
REFERENCES location.region (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__companies_company_city | type: CONSTRAINT --
-- ALTER TABLE companies.company DROP CONSTRAINT fk__companies_company_city;
ALTER TABLE companies.company ADD CONSTRAINT fk__companies_company_city FOREIGN KEY (city_id)
REFERENCES location.city (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__companies_company_opf | type: CONSTRAINT --
-- ALTER TABLE companies.company DROP CONSTRAINT fk__companies_company_opf;
ALTER TABLE companies.company ADD CONSTRAINT fk__companies_company_opf FOREIGN KEY (opf_company_id)
REFERENCES companies.company_opf (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__companies_company_worker_count | type: CONSTRAINT --
-- ALTER TABLE companies.company DROP CONSTRAINT fk__companies_company_worker_count;
ALTER TABLE companies.company ADD CONSTRAINT fk__companies_company_worker_count FOREIGN KEY (worker_count_id)
REFERENCES companies.worker_count (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__companies_company_company_type | type: CONSTRAINT --
-- ALTER TABLE companies.company DROP CONSTRAINT fk__companies_company_company_type;
ALTER TABLE companies.company ADD CONSTRAINT fk__companies_company_company_type FOREIGN KEY (company_type_id)
REFERENCES companies.company_type (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__users_user | type: CONSTRAINT --
-- ALTER TABLE users.user_data DROP CONSTRAINT fk__users_user;
ALTER TABLE users.user_data ADD CONSTRAINT fk__users_user FOREIGN KEY (user_id)
REFERENCES users.user (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__users_role_dimension_user | type: CONSTRAINT --
-- ALTER TABLE users.role_dimension DROP CONSTRAINT fk__users_role_dimension_user;
ALTER TABLE users.role_dimension ADD CONSTRAINT fk__users_role_dimension_user FOREIGN KEY (user_id)
REFERENCES users.user (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__users_role_dimension_role | type: CONSTRAINT --
-- ALTER TABLE users.role_dimension DROP CONSTRAINT fk__users_role_dimension_role;
ALTER TABLE users.role_dimension ADD CONSTRAINT fk__users_role_dimension_role FOREIGN KEY (role_id)
REFERENCES users.role (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__companies_company_dimension_user | type: CONSTRAINT --
-- ALTER TABLE companies.company_dimension DROP CONSTRAINT fk__companies_company_dimension_user;
ALTER TABLE companies.company_dimension ADD CONSTRAINT fk__companies_company_dimension_user FOREIGN KEY (user_id)
REFERENCES users.user (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__companies_company_dimension_company | type: CONSTRAINT --
-- ALTER TABLE companies.company_dimension DROP CONSTRAINT fk__companies_company_dimension_company;
ALTER TABLE companies.company_dimension ADD CONSTRAINT fk__companies_company_dimension_company FOREIGN KEY (company_id)
REFERENCES companies.company (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk__companies_post_id | type: CONSTRAINT --
-- ALTER TABLE companies.company_dimension DROP CONSTRAINT fk__companies_post_id;
ALTER TABLE companies.company_dimension ADD CONSTRAINT fk__companies_post_id FOREIGN KEY (user_post_id)
REFERENCES companies.post (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --





COMMIT ;
