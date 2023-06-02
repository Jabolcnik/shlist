CREATE TABLE Users (
  Id SERIAL PRIMARY KEY,
  UserName VARCHAR(255),
  UserEmail VARCHAR(255),
  Password TEXT,
  CreatedOn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ModifiedOn TIMESTAMP,
  DeletedOn TIMESTAMP,
  CreatedBy VARCHAR(255),
  ModifiedBy VARCHAR(255),
  DeletedBy VARCHAR(255),
  IsDeleted BOOLEAN DEFAULT FALSE
);

CREATE TABLE ShoppingLists (
  Id SERIAL PRIMARY KEY,
  CreatedOn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ModifiedOn TIMESTAMP,
  DeletedOn TIMESTAMP,
  CreatedBy VARCHAR(255),
  ModifiedBy VARCHAR(255),
  DeletedBy VARCHAR(255),
  IsDeleted BOOLEAN DEFAULT FALSE
);

CREATE TABLE Items (
  Id SERIAL PRIMARY KEY,
  ItemName VARCHAR(255),
  Bought BOOLEAN DEFAULT FALSE,
  UserId INTEGER,
  ListId INTEGER,
  CreatedOn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ModifiedOn TIMESTAMP,
  DeletedOn TIMESTAMP,
  CreatedBy VARCHAR(255),
  ModifiedBy VARCHAR(255),
  DeletedBy VARCHAR(255),
  IsDeleted BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (UserId) REFERENCES Users(Id),
  FOREIGN KEY (ListId) REFERENCES ShoppingLists(Id)
);

-- Creating triggers
CREATE OR REPLACE FUNCTION update_modified_column()
RETURNS TRIGGER AS $$
BEGIN
  NEW.ModifiedOn = NOW();
  RETURN NEW;
END;
$$ language 'plpgsql';

CREATE TRIGGER update_users_modtime
  BEFORE UPDATE ON Users
  FOR EACH ROW
  EXECUTE PROCEDURE update_modified_column();

CREATE TRIGGER update_shoppinglists_modtime
  BEFORE UPDATE ON ShoppingLists
  FOR EACH ROW
  EXECUTE PROCEDURE update_modified_column();

CREATE TRIGGER update_items_modtime
  BEFORE UPDATE ON Items
  FOR EACH ROW
  EXECUTE PROCEDURE update_modified_column();

-- Soft delete triggers
CREATE OR REPLACE FUNCTION soft_delete()
RETURNS TRIGGER AS $$
BEGIN
  NEW.IsDeleted = TRUE;
  NEW.DeletedOn = NOW();
  RETURN NULL; -- Result is ignored since this is an AFTER trigger
END;
$$ language 'plpgsql';

CREATE TRIGGER soft_delete_users
  BEFORE DELETE ON Users
  FOR EACH ROW
  EXECUTE PROCEDURE soft_delete();

CREATE TRIGGER soft_delete_shoppinglists
  BEFORE DELETE ON ShoppingLists
  FOR EACH ROW
  EXECUTE PROCEDURE soft_delete();

CREATE TRIGGER soft_delete_items
  BEFORE DELETE ON Items
  FOR EACH ROW
  EXECUTE PROCEDURE soft_delete();
 
 ALTER USER api_shlist WITH PASSWORD '234434"#$#"$br3234DF';
 
 -- Create a new user
CREATE USER api_shlist WITH ENCRYPTED PASSWORD '234434"#$#"$br3234DF';

-- Grant connect privilege to the database
GRANT CONNECT ON DATABASE shlist TO api_shlist;

-- Grant usage privilege on the schema
GRANT USAGE ON SCHEMA public TO api_shlist;

-- Grant select, insert, and update privileges on the tables to the new user
GRANT SELECT, INSERT, UPDATE ON TABLE Users TO api_shlist;
GRANT SELECT, INSERT, UPDATE ON TABLE ShoppingLists TO api_shlist;
GRANT SELECT, INSERT, UPDATE ON TABLE Items TO api_shlist;

-- Grant privileges on sequences to allow auto incrementing fields to work
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO api_shlist;
 
 
 
 
 
