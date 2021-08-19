<?php

/*Exemplo de stored procedures*/
delimiter ##
drop procedure if exists iCadastroPessoa ##
create procedure iCadastroPessoa(
in nomeP varchar(255),dtNascP date,loginP varchar(255),senhaP varchar(255),
perfilP varchar(255),emailP varchar(255),cpfP varchar(14),cepP varchar(10),
logradouroP varchar(255),bairroP varchar(255),cidadeP varchar(255),UFP varchar(2),complementoP varchar(255), out msg text)
begin
declare idx int(11);
declare 
select idEndereco into idx from endereco where logradouro = logradouroP and complemento = complementoP and cep = cepP;
if (idx = 0) then
	insert into endereco values (null,cepP,
	logradouroP,bairroP,cidadeP,UFP complementoP)_;
	select idEndereco into idx from endereco where 
	logradouro = logradouroP and complemento = complementoP and cep = cepP; 
	
end if;
insert into pessoa values (null,nomeP,dtNascP,loginP,senhaP,perfilP,emailP,cpfP,idx)
select * from pessoa inner join endereco where fkEndereco = idEndereco
end ##
delimiter ;