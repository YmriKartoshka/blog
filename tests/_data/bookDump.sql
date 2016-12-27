CREATE TABLE b_author (
    id integer NOT NULL,
    "firstName" character varying(255),
    "lastName" character varying(255),
    "secondName" character varying(255),
    "birthDay" date,
    "deathDay" date
);


ALTER TABLE b_author OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 1768794)
-- Name: b_author_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE b_author_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE b_author_id_seq OWNER TO postgres;

--
-- TOC entry 2252 (class 0 OID 0)
-- Dependencies: 188
-- Name: b_author_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE b_author_id_seq OWNED BY b_author.id;


--
-- TOC entry 194 (class 1259 OID 1768822)
-- Name: b_bclink; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_bclink (
    "idBook" integer NOT NULL,
    "idComment" integer NOT NULL
);


ALTER TABLE b_bclink OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 1768784)
-- Name: b_book; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_book (
    id integer NOT NULL,
    name character varying(255),
    description character varying(255),
    "coverImage" character varying(255),
    year integer,
    "authorId" integer,
    "genreId" integer,
    publish smallint DEFAULT 1,
    "creatorId" integer,
    "createDate" date
);


ALTER TABLE b_book OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 1768782)
-- Name: b_book_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE b_book_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE b_book_id_seq OWNER TO postgres;

--
-- TOC entry 2253 (class 0 OID 0)
-- Dependencies: 186
-- Name: b_book_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE b_book_id_seq OWNED BY b_book.id;


--
-- TOC entry 193 (class 1259 OID 1768815)
-- Name: b_comments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_comments (
    id integer NOT NULL,
    message character varying(100) NOT NULL,
    grade integer,
    "isShown" smallint DEFAULT 1 NOT NULL,
    "creatorId" integer,
    "createDate" date
);


ALTER TABLE b_comments OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 1768813)
-- Name: b_comments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE b_comments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE b_comments_id_seq OWNER TO postgres;

--
-- TOC entry 2254 (class 0 OID 0)
-- Dependencies: 192
-- Name: b_comments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE b_comments_id_seq OWNED BY b_comments.id;


--
-- TOC entry 198 (class 1259 OID 1768844)
-- Name: b_eclink; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_eclink (
    "idEvent" integer NOT NULL,
    "idComment" integer NOT NULL
);


ALTER TABLE b_eclink OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 1768829)
-- Name: b_event; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_event (
    id integer NOT NULL,
    name character varying(255),
    description character varying(255),
    date date,
    "bookId" integer,
    publish smallint DEFAULT 1,
    "creatorId" integer,
    "createDate" date
);


ALTER TABLE b_event OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 1768827)
-- Name: b_event_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE b_event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE b_event_id_seq OWNER TO postgres;

--
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 195
-- Name: b_event_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE b_event_id_seq OWNED BY b_event.id;


--
-- TOC entry 191 (class 1259 OID 1768807)
-- Name: b_genre; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_genre (
    id integer NOT NULL,
    name character varying(255)
);


ALTER TABLE b_genre OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 1768805)
-- Name: b_genre_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE b_genre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE b_genre_id_seq OWNER TO postgres;

--
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 190
-- Name: b_genre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE b_genre_id_seq OWNED BY b_genre.id;


--
-- TOC entry 181 (class 1259 OID 1760764)
-- Name: b_migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE b_migration OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 1768776)
-- Name: b_profile; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_profile (
    id integer NOT NULL,
    "firstName" character varying(50),
    "lastName" character varying(50),
    "secondName" character varying(50),
    email character varying(100),
    phone bigint
);


ALTER TABLE b_profile OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 1768774)
-- Name: b_profile_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE b_profile_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE b_profile_id_seq OWNER TO postgres;

--
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 184
-- Name: b_profile_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE b_profile_id_seq OWNED BY b_profile.id;


--
-- TOC entry 197 (class 1259 OID 1768839)
-- Name: b_subscriptions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_subscriptions (
    "idEvent" integer NOT NULL,
    "idUser" integer NOT NULL
);


ALTER TABLE b_subscriptions OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 1768764)
-- Name: b_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE b_user (
    id integer NOT NULL,
    login character varying(50) NOT NULL,
    "passwordHash" character varying(255) NOT NULL,
    "profileId" integer NOT NULL,
    "isBan" smallint DEFAULT 0 NOT NULL,
    "isModerator" smallint DEFAULT 0 NOT NULL
);


ALTER TABLE b_user OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 1768762)
-- Name: b_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE b_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE b_user_id_seq OWNER TO postgres;

--
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 182
-- Name: b_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE b_user_id_seq OWNED BY b_user.id;


--
-- TOC entry 2082 (class 2604 OID 1768799)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_author ALTER COLUMN id SET DEFAULT nextval('b_author_id_seq'::regclass);


--
-- TOC entry 2080 (class 2604 OID 1768787)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_book ALTER COLUMN id SET DEFAULT nextval('b_book_id_seq'::regclass);


--
-- TOC entry 2084 (class 2604 OID 1768818)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_comments ALTER COLUMN id SET DEFAULT nextval('b_comments_id_seq'::regclass);


--
-- TOC entry 2086 (class 2604 OID 1768832)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_event ALTER COLUMN id SET DEFAULT nextval('b_event_id_seq'::regclass);


--
-- TOC entry 2083 (class 2604 OID 1768810)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_genre ALTER COLUMN id SET DEFAULT nextval('b_genre_id_seq'::regclass);


--
-- TOC entry 2079 (class 2604 OID 1768779)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_profile ALTER COLUMN id SET DEFAULT nextval('b_profile_id_seq'::regclass);


--
-- TOC entry 2076 (class 2604 OID 1768767)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_user ALTER COLUMN id SET DEFAULT nextval('b_user_id_seq'::regclass);


--
-- TOC entry 2234 (class 0 OID 1768796)
-- Dependencies: 189
-- Data for Name: b_author; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO b_author (id, "firstName", "lastName", "secondName", "birthDay", "deathDay") VALUES (1, 'Алексанр', 'Пушкин', 'Сергеевич', '1799-06-06', '1799-02-10');
INSERT INTO b_author (id, "firstName", "lastName", "secondName", "birthDay", "deathDay") VALUES (2, 'Лев', 'Толстой', 'Николаевич', '1828-09-09', '1910-11-20');
INSERT INTO b_author (id, "firstName", "lastName", "secondName", "birthDay", "deathDay") VALUES (3, 'Михаил', 'Лермонтов', 'Юрьевич', '1814-10-15', '1841-07-27');


--
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 188
-- Name: b_author_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('b_author_id_seq', 3, true);


--
-- TOC entry 2239 (class 0 OID 1768822)
-- Dependencies: 194
-- Data for Name: b_bclink; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2232 (class 0 OID 1768784)
-- Dependencies: 187
-- Data for Name: b_book; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 186
-- Name: b_book_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('b_book_id_seq', 1, false);


--
-- TOC entry 2238 (class 0 OID 1768815)
-- Dependencies: 193
-- Data for Name: b_comments; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 192
-- Name: b_comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('b_comments_id_seq', 1, false);


--
-- TOC entry 2243 (class 0 OID 1768844)
-- Dependencies: 198
-- Data for Name: b_eclink; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2241 (class 0 OID 1768829)
-- Dependencies: 196
-- Data for Name: b_event; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 195
-- Name: b_event_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('b_event_id_seq', 1, false);


--
-- TOC entry 2236 (class 0 OID 1768807)
-- Dependencies: 191
-- Data for Name: b_genre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO b_genre (id, name) VALUES (1, 'Ужасы');
INSERT INTO b_genre (id, name) VALUES (2, 'Фантастика');
INSERT INTO b_genre (id, name) VALUES (3, 'Детектив');


--
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 190
-- Name: b_genre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('b_genre_id_seq', 3, true);


--
-- TOC entry 2226 (class 0 OID 1760764)
-- Dependencies: 181
-- Data for Name: b_migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO b_migration (version, apply_time) VALUES ('m000000_000000_base', 1481887543);
INSERT INTO b_migration (version, apply_time) VALUES ('m161126_070042_create_user_table', 1482492914);
INSERT INTO b_migration (version, apply_time) VALUES ('m161126_071531_create_profile_table', 1482492914);
INSERT INTO b_migration (version, apply_time) VALUES ('m161203_075251_create_book_table', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161203_075920_create_author_table', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161203_080110_create_genre_table', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161216_103014_fakeData', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161219_021410_create_coomments_table', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161219_022312_create_book_comments_linktable', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161220_124854_create_event_table', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161220_125453_create_event_subscriptions_table', 1482492915);
INSERT INTO b_migration (version, apply_time) VALUES ('m161220_130116_create_event_comments_linktable', 1482492915);


--
-- TOC entry 2230 (class 0 OID 1768776)
-- Dependencies: 185
-- Data for Name: b_profile; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO b_profile (id, "firstName", "lastName", "secondName", email, phone) VALUES (1, 'firstName', 'lastName', 'secondName', 'admin@mail.ru', 88005553535);
INSERT INTO b_profile (id, "firstName", "lastName", "secondName", email, phone) VALUES (2, 'Владислав', 'Иванцов', 'Lomaster', 'mail@mail.com', 88005553536);


--
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 184
-- Name: b_profile_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('b_profile_id_seq', 2, true);


--
-- TOC entry 2242 (class 0 OID 1768839)
-- Dependencies: 197
-- Data for Name: b_subscriptions; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2228 (class 0 OID 1768764)
-- Dependencies: 183
-- Data for Name: b_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO b_user (id, login, "passwordHash", "profileId", "isBan", "isModerator") VALUES (2, 'Master', '$2y$13$j1wcweuJUz7nmdgYOLlHJeOSZVtw1Zpkm.NhglJbAPIIaeyjAr/LC', 2, 0, 0);
INSERT INTO b_user (id, login, "passwordHash", "profileId", "isBan", "isModerator") VALUES (1, 'admin', '$2y$13$dLarVDEm12z7ySrtlwwTPe1Zrq0TXd0WicPbIRzdoCsAyvgfXyha6', 1, 0, 1);


--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 182
-- Name: b_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('b_user_id_seq', 2, true);


--
-- TOC entry 2099 (class 2606 OID 1768804)
-- Name: b_author_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_author
    ADD CONSTRAINT b_author_pkey PRIMARY KEY (id);


--
-- TOC entry 2097 (class 2606 OID 1768793)
-- Name: b_book_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_book
    ADD CONSTRAINT b_book_pkey PRIMARY KEY (id);


--
-- TOC entry 2103 (class 2606 OID 1768821)
-- Name: b_comments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_comments
    ADD CONSTRAINT b_comments_pkey PRIMARY KEY (id);


--
-- TOC entry 2107 (class 2606 OID 1768838)
-- Name: b_event_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_event
    ADD CONSTRAINT b_event_pkey PRIMARY KEY (id);


--
-- TOC entry 2101 (class 2606 OID 1768812)
-- Name: b_genre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_genre
    ADD CONSTRAINT b_genre_pkey PRIMARY KEY (id);


--
-- TOC entry 2089 (class 2606 OID 1760768)
-- Name: b_migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_migration
    ADD CONSTRAINT b_migration_pkey PRIMARY KEY (version);


--
-- TOC entry 2095 (class 2606 OID 1768781)
-- Name: b_profile_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_profile
    ADD CONSTRAINT b_profile_pkey PRIMARY KEY (id);


--
-- TOC entry 2091 (class 2606 OID 1768773)
-- Name: b_user_login_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_user
    ADD CONSTRAINT b_user_login_key UNIQUE (login);


--
-- TOC entry 2093 (class 2606 OID 1768771)
-- Name: b_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_user
    ADD CONSTRAINT b_user_pkey PRIMARY KEY (id);


--
-- TOC entry 2105 (class 2606 OID 1768826)
-- Name: bcpk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_bclink
    ADD CONSTRAINT bcpk PRIMARY KEY ("idBook", "idComment");


--
-- TOC entry 2111 (class 2606 OID 1768848)
-- Name: ecpk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_eclink
    ADD CONSTRAINT ecpk PRIMARY KEY ("idEvent", "idComment");


--
-- TOC entry 2109 (class 2606 OID 1768843)
-- Name: eupk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY b_subscriptions
    ADD CONSTRAINT eupk PRIMARY KEY ("idEvent", "idUser");


--
-- TOC entry 2250 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-12-27 19:18:37 +07

--
-- PostgreSQL database dump complete
--

