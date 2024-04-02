CREATE DATABASE tienda_master
use tienda_master

create table usuarios(
id int(255) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(255),
email varchar(255) not null,
password varchar(255) not null,
rol varchar(20),
imagen varchar(255),
constraint pk_usuarios PRIMARY KEY(id),
constraint uq_email UNIQUE(email)
)engine=InnoDb;

create table categorias(
id int(255) auto_increment not null,
nombre varchar(100) not null,
constraint pk_categorias primary key (id)
)engine=InnoDb;

create table productos(
id int(255) auto_increment not null,
categoria_id int(255) not null,
nombre varchar(100) not null,
descripcion text,
precio float(100,2),
stock int(255) not null,
oferta varchar(2),
fecha date not null,
imagen varchar(255),
constraint pk_productos primary key(id),
constraint fk_producto_categoria foreign key(categoria_id) references categorias(id)
)engine=InnoDb;

create table pedidos(
id int(255) auto_increment not null,
usuario_id int(255) not null,
provincia varchar(100) not null,
localidad varchar(100) not null,
direccion varchar(255) not null,
coste float(200,2) not null,
estado varchar(20) not null,
fecha date,
hora time,
constraint pk_pedidos primary key(id),
constraint fk_pedidos_usuario foreign key(usuario_id) references usuarios(id)
)engine=InnoDb;

create table lineas_pedidos(
id int(255) auto_increment not null,
pedido_id int(255) not null,
producto_id int(255) not null,
constraint pk_lineas_pedidos primary key(id),
constraint fk_linea_pedido foreign key(pedido_id) references pedidos(id),
constraint fk_linea_producto foreign key(producto_id) references productos(id)
)engine=InnoDb;