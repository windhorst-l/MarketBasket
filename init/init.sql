
IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'Login')
BEGIN
    CREATE DATABASE Login;
END
GO

USE Login;
GO


IF NOT EXISTS (SELECT * FROM sys.objects WHERE name = 'roles' AND type = 'U')
BEGIN
    CREATE TABLE roles (
        id INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
        role_name VARCHAR(50) NOT NULL UNIQUE
    );
END
GO


IF NOT EXISTS (SELECT * FROM sys.objects WHERE name = 'Accounts' AND type = 'U')
BEGIN
    CREATE TABLE Accounts (
        id INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role_id INT NOT NULL, 
        FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
    );
END
GO


IF NOT EXISTS (SELECT * FROM sys.objects WHERE name = 'permissions' AND type = 'U')
BEGIN
    CREATE TABLE permissions (
        id INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
        role_id INT NOT NULL,
        permission_name NVARCHAR(50) NOT NULL,
        FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
    );
END
GO

IF NOT EXISTS (SELECT * FROM roles WHERE role_name = 'admin')
BEGIN
    INSERT INTO roles (role_name) VALUES ('admin'), ('dev'), ('user');
END
GO

IF NOT EXISTS (SELECT * FROM Accounts WHERE username = 'IN23')
BEGIN
    DECLARE @role_id INT;
    SELECT @role_id = id FROM roles WHERE role_name = 'dev';

    INSERT INTO Accounts (username, password, role_id)
    VALUES ('IN23', '$2y$10$MWYm7RKEVJ8Us7S1S4j/n.l4yEDQzytDMH15PCFT0YZvYGc7nqUnC', @role_id);
END
GO

IF NOT EXISTS (SELECT * FROM permissions WHERE permission_name = 'dev')
BEGIN
    DECLARE @admin_role INT, @dev_role INT, @user_role INT;
    
    SELECT @admin_role = id FROM roles WHERE role_name = 'admin';
    SELECT @dev_role = id FROM roles WHERE role_name = 'dev';
    SELECT @user_role = id FROM roles WHERE role_name = 'user';

    INSERT INTO permissions (role_id, permission_name) VALUES
    (@admin_role, 'manage_shop'),
    (@dev_role, 'dev'),
    (@dev_role, 'manage_roles'),
    (@user_role, 'custom');
END
GO

