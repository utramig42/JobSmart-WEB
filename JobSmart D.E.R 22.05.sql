CREATE TABLE marca (
  id_marca INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nm_marca VARCHAR(60) NOT NULL,
  PRIMARY KEY(id_marca)
);

CREATE TABLE forma_pagamento (
  id_forma INTEGER UNSIGNED NOT NULL,
  desc_forma VARCHAR(60) NOT NULL,
  ativo_forma BOOL NULL DEFAULT 1,
  PRIMARY KEY(id_forma)
);

CREATE TABLE fornecedor (
  id_for INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nm_for VARCHAR(60) NOT NULL,
  cnpj_for VARCHAR(255) NOT NULL,
  raz_soc_for VARCHAR(60) NOT NULL,
  uf_for VARCHAR(2) NOT NULL,
  cid_for VARCHAR(40) NOT NULL,
  end_for VARCHAR(30) NOT NULL,
  nm_cont_for VARCHAR(60) NULL,
  tel_fix_for VARCHAR(15) NOT NULL,
  dt_cad_for TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  tel_cel_for VARCHAR(15) NULL,
  PRIMARY KEY(id_for)
);

CREATE TABLE perfil (
  id_perfil INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nm_perfil TEXT(60) NOT NULL,
  ativo_perfil BOOL NULL DEFAULT 1,
  PRIMARY KEY(id_perfil)
);

CREATE TABLE categoria (
  id_cat INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nm_cat VARCHAR(60) NULL,
  PRIMARY KEY(id_cat)
);

CREATE TABLE cargo (
  id_cargo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_perfil INTEGER UNSIGNED NOT NULL,
  nm_cargo VARCHAR(60) NULL,
  ativo_cargo BOOL NULL DEFAULT 1,
  PRIMARY KEY(id_cargo),
  INDEX Cargo_FKIndex1(id_perfil),
  FOREIGN KEY(id_perfil)
    REFERENCES perfil(id_perfil)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE produto (
  id_prod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_marca INTEGER UNSIGNED NOT NULL,
  id_cat INTEGER UNSIGNED NOT NULL,
  nm_prod VARCHAR(60) NOT NULL,
  qtd_min_prod INTEGER UNSIGNED NOT NULL,
  dt_cad_prod TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  obs_prod TEXT(500) NULL,
  ativo_prod BOOL NULL DEFAULT 1,
  qtd_prod INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_prod),
  INDEX produto_FKIndex2(id_cat),
  INDEX produto_FKIndex3(id_marca),
  FOREIGN KEY(id_cat)
    REFERENCES categoria(id_cat)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_marca)
    REFERENCES marca(id_marca)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE estoque (
  id_est INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_for INTEGER UNSIGNED NOT NULL,
  id_prod INTEGER UNSIGNED NOT NULL,
  lote_est VARCHAR(10) NOT NULL,
  vlr_custo_est DOUBLE NOT NULL,
  vlr_venda_est DOUBLE NOT NULL,
  qtd_prod_est INTEGER UNSIGNED NOT NULL,
  dt_fab_est DATE NOT NULL,
  dt_val_est DATE NOT NULL,
  obs_est TEXT(500) NULL,
  ativo_est BOOL NULL DEFAULT 1,
  dt_cad_est TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY(id_est, id_for, id_prod),
  INDEX estoque_FKIndex1(id_for),
  INDEX estoque_FKIndex2(id_prod),
  FOREIGN KEY(id_for)
    REFERENCES fornecedor(id_for)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_prod)
    REFERENCES produto(id_prod)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE funcionário (
  mat_fun INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_cargo INTEGER UNSIGNED NOT NULL,
  nm_fun VARCHAR(60) NOT NULL,
  end_fun VARCHAR(100) NOT NULL,
  uf_fun VARCHAR(2) NOT NULL,
  cid_fun VARCHAR(60) NOT NULL,
  sal_fun DOUBLE NOT NULL,
  cpf_fun VARCHAR(12) NOT NULL,
  tel_fun VARCHAR(15) NOT NULL,
  dt_nasc_fun DATE NOT NULL,
  dt_res_fun DATE NULL,
  temp_ativo_fun BOOL NULL DEFAULT 1,
  dt_admin TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY(mat_fun),
  INDEX Funcionário_FKIndex1(id_cargo),
  FOREIGN KEY(id_cargo)
    REFERENCES cargo(id_cargo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE acesso (
  id_acesso INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  mat_fun INTEGER UNSIGNED NOT NULL,
  senha_acesso VARCHAR(24) NULL,
  dt_ult_acesso DATETIME NULL,
  PRIMARY KEY(id_acesso),
  INDEX acesso_FKIndex1(mat_fun),
  FOREIGN KEY(mat_fun)
    REFERENCES funcionário(mat_fun)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE venda (
  id_venda INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  mat_fun INTEGER UNSIGNED NOT NULL,
  dt_venda TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  vlr_venda DOUBLE NOT NULL,
  PRIMARY KEY(id_venda, mat_fun),
  INDEX venda_FKIndex1(mat_fun),
  FOREIGN KEY(mat_fun)
    REFERENCES funcionário(mat_fun)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE itens_venda (
  Id_itens_venda INTEGER UNSIGNED NOT NULL,
  id_est INTEGER UNSIGNED NOT NULL,
  id_venda INTEGER UNSIGNED NOT NULL,
  id_prod INTEGER UNSIGNED NOT NULL,
  id_for INTEGER UNSIGNED NOT NULL,
  mat_fun INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Id_itens_venda, id_est, id_venda, id_prod, id_for, mat_fun),
  INDEX itens_venda_FKIndex1(id_venda, mat_fun),
  INDEX itens_venda_FKIndex2(id_est, id_for, id_prod),
  FOREIGN KEY(id_venda, mat_fun)
    REFERENCES venda(id_venda, mat_fun)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_est, id_for, id_prod)
    REFERENCES estoque(id_est, id_for, id_prod)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE pagamento (
  id_pag INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  mat_fun INTEGER UNSIGNED NOT NULL,
  id_venda INTEGER UNSIGNED NOT NULL,
  id_forma INTEGER UNSIGNED NOT NULL,
  vlr_pag DOUBLE NOT NULL,
  vlr_troco_pag DOUBLE NOT NULL,
  PRIMARY KEY(id_pag),
  INDEX pagamento_FKIndex1(id_venda, mat_fun),
  INDEX pagamento_FKIndex2(id_forma),
  FOREIGN KEY(id_venda, mat_fun)
    REFERENCES venda(id_venda, mat_fun)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_forma)
    REFERENCES forma_pagamento(id_forma)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


