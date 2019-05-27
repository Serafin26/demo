CREATE TABLE departamento
(
	pk_departamento PRIMARY KEY INT AUTO_INCREMENT NOT NULL,
	departamento VARCHAR(50) NOT NULL,
	activo INT NOT NULL,
	hora TIME,
	fecha DATE
	

);

CREATE TABLE grado
(
	pk_grado INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	grado VARCHAR(50) NOT NULL
	activo INT NOT NULL,
	hora TIME,
	fecha DATE
	
);

CREATE TABLE profesion
(
	pk_profesion INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	profesion VARCHAR(100) NOT NULL,
	activo INT NOT NULL,
	hora TIME,
	fecha DATE
	
);


CREATE TABLE persona
(
	pk_persona INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombres VARCHAR(50) NOT NULL,
	apellidop VARCHAR(50) NOT NULL,
	apellidom VARCHAR(50) NOT NULL,
	edad INT,
	sexo INT,
	correo VARCHAR(50) NOT NULL,
	clave VARCHAR(100) NOT NULL,	
	foto VARCHAR(100) NOT NULL,
	activo INT NOT NULL,
	hora TIME,
	fecha DATE,
	fk_departamento INT,
	fk_profesion INT,
	fk_grado INT,
	FOREIGN KEY (fk_departamento) REFERENCES departamento (pk_departamento),
	FOREIGN KEY (fk_profesion) REFERENCES profesion (pk_profesion),
	FOREIGN KEY (fk_grado) REFERENCES grado (pk_grado),
	
);

CREATE TABLE puesto
(
	pk_puesto INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	puesto VARCHAR(50) NOT NULL,
	salario FLOAT(8,2) NOT NULL,
	fk_departamento INT,
	activo INT NOT NULL,
	hora TIME,
	fecha DATE,
	FOREIGN KEY (fk_departamento) REFERENCES departamento (pk_departamento)
);

