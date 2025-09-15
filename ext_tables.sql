CREATE TABLE tx_dveducationcourses_domain_model_course (
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    content text,
    objectives text,
    target_groups text,
    admission_requirements text,
    slug varchar(2048) DEFAULT '' NOT NULL,
    type int(11) unsigned DEFAULT '0' NOT NULL,
    contact_persons int(11) unsigned DEFAULT '0' NOT NULL,
    events int(11) unsigned DEFAULT '0' NOT NULL,
    similar_courses int(11) unsigned DEFAULT '0' NOT NULL,
    images int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationcourses_domain_model_event (
    title varchar(255) DEFAULT '' NOT NULL,
    event_code varchar(100) DEFAULT '' NOT NULL,
    description text,
    startdate int(11) DEFAULT '0' NOT NULL,
    enddate int(11) DEFAULT '0' NOT NULL,
    duration varchar(100) DEFAULT '' NOT NULL,
    price decimal(10,2) DEFAULT '0.00' NOT NULL,
    location int(11) unsigned DEFAULT '0' NOT NULL,
    course int(11) unsigned DEFAULT '0' NOT NULL,
    booked_up tinyint(1) unsigned DEFAULT '0' NOT NULL,
    on_request tinyint(1) unsigned DEFAULT '0' NOT NULL,
    slug varchar(2048) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationcourses_domain_model_singleevent (
    title varchar(255) DEFAULT '' NOT NULL,
    startdate int(11) DEFAULT '0' NOT NULL,
    enddate int(11) DEFAULT '0' NOT NULL,
    event int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationcourses_domain_model_location (
    name varchar(255) DEFAULT '' NOT NULL,
    city varchar(255) DEFAULT '' NOT NULL,
    zipcode varchar(20) DEFAULT '' NOT NULL,
    street varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationcourses_domain_model_type (
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    slug varchar(2048) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationcourses_domain_model_contactperson (
    salutation varchar(20) DEFAULT '' NOT NULL,
    title varchar(100) DEFAULT '' NOT NULL,
    first_name varchar(255) DEFAULT '' NOT NULL,
    last_name varchar(255) DEFAULT '' NOT NULL,
    phone varchar(50) DEFAULT '' NOT NULL,
    email varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationcourses_course_contactperson_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_dveducationcourses_course_similar_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
