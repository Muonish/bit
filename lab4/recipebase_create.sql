-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2015-04-28 17:38:04.556




-- tables
-- Table ingredient
CREATE TABLE ingredient (
    ingredient_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(255)    NOT NULL ,
    CONSTRAINT ingredient_pk PRIMARY KEY (ingredient_id)
);

-- Table recipe
CREATE TABLE recipe (
    recipe_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(255)    NOT NULL ,
    CONSTRAINT recipe_pk PRIMARY KEY (recipe_id)
);

-- Table recipe_map
CREATE TABLE recipe_map (
    recipe_id int    NOT NULL ,
    ingredient_id int    NOT NULL ,
    step int    NOT NULL ,
    number int    NOT NULL ,
    text text    NOT NULL ,
    type_id int    NOT NULL ,
    CONSTRAINT recipe_map_pk PRIMARY KEY (recipe_id,ingredient_id)
);

-- Table `table`
CREATE TABLE `table` (
    table_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(255)    NOT NULL ,
    CONSTRAINT table_pk PRIMARY KEY (table_id)
);

-- Table table_map
CREATE TABLE table_map (
    table_id int    NOT NULL ,
    recipe_id int    NOT NULL ,
    CONSTRAINT table_map_pk PRIMARY KEY (table_id,recipe_id)
);

-- Table type
CREATE TABLE type (
    type_id int    NOT NULL  AUTO_INCREMENT,
    name varchar(255)    NOT NULL ,
    CONSTRAINT type_pk PRIMARY KEY (type_id)
);





-- foreign keys
-- Reference:  recipe_map_ingredient (table: recipe_map)


ALTER TABLE recipe_map ADD CONSTRAINT recipe_map_ingredient FOREIGN KEY recipe_map_ingredient (ingredient_id)
    REFERENCES ingredient (ingredient_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;
-- Reference:  recipe_map_recipe (table: recipe_map)


ALTER TABLE recipe_map ADD CONSTRAINT recipe_map_recipe FOREIGN KEY recipe_map_recipe (recipe_id)
    REFERENCES recipe (recipe_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;
-- Reference:  recipe_map_type (table: recipe_map)


ALTER TABLE recipe_map ADD CONSTRAINT recipe_map_type FOREIGN KEY recipe_map_type (type_id)
    REFERENCES type (type_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;
-- Reference:  table_map_recipe (table: table_map)


ALTER TABLE table_map ADD CONSTRAINT table_map_recipe FOREIGN KEY table_map_recipe (recipe_id)
    REFERENCES recipe (recipe_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;
-- Reference:  table_map_table (table: table_map)


ALTER TABLE table_map ADD CONSTRAINT table_map_table FOREIGN KEY table_map_table (table_id)
    REFERENCES `table` (table_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;



-- End of file.

