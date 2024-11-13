-- --------------------------------------------------------------------------------------------
-- Database creation script for Saas Vanilla MVC
-- Author: Adrian Gould
--
-- ATTENTION: Replace tjg with YOUR INITIALS before continuing
-- --------------------------------------------------------------------------------------------


-- --------------------------------------------------------------------------------------------
-- Clear up previous versions of the Database and User
-- --------------------------------------------------------------------------------------------
DROP
DATABASE IF EXISTS tjg_php_mvc_jokes;
DROP
USER IF EXISTS 'tjg_php_mvc_jokes'@'localhost';
DROP
USER IF EXISTS 'tjg_php_mvc_jokes'@'127.0.0.1';

-- --------------------------------------------------------------------------------------------
-- Create the tjg_mvc_Jokes Database & two users (one each for @localhost, @127.0.0.1)
-- ATTENTION: Replace tjg with YOUR INITIALS
-- --------------------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS tjg_php_mvc_jokes;

CREATE USER 'tjg_php_mvc_jokes'@'localhost'
    IDENTIFIED WITH mysql_native_password
        BY 'Password1234';

CREATE USER 'tjg_php_mvc_jokes'@'127.0.0.1'
    IDENTIFIED WITH mysql_native_password
        BY 'Password1234';

-- --------------------------------------------------------------------------------------------
-- Provide full access to the database to the two users
-- --------------------------------------------------------------------------------------------
GRANT USAGE ON *.*
    TO 'tjg_php_mvc_jokes'@'localhost';

GRANT ALL PRIVILEGES
    ON `tjg_php_mvc_jokes`.*
    TO 'tjg_php_mvc_jokes'@'localhost';

GRANT USAGE ON *.*
    TO 'tjg_php_mvc_jokes'@'127.0.0.1';

GRANT ALL PRIVILEGES
    ON `tjg_php_mvc_jokes`.*
    TO 'tjg_php_mvc_jokes'@'127.0.0.1';
