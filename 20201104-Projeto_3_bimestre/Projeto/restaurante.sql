
-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE IF NOT EXISTS `cardapio` (
  `id_cardapio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cardapio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id_cardapio`, `nome`) VALUES
(10, 'e'),
(11, 'solteiro'),
(12, 'ola'),
(13, 'eu e vc 2'),
(14, 'quarta'),
(15, 'solteiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio_comida`
--

CREATE TABLE IF NOT EXISTS `cardapio_comida` (
  `id_cardapio_comida` int(11) NOT NULL AUTO_INCREMENT,
  `cod_comida` int(11) NOT NULL,
  `cod_cardapio` int(11) NOT NULL,
  PRIMARY KEY (`id_cardapio_comida`),
  KEY `cod_comida` (`cod_comida`),
  KEY `cod_cardapio` (`cod_cardapio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Extraindo dados da tabela `cardapio_comida`
--

INSERT INTO `cardapio_comida` (`id_cardapio_comida`, `cod_comida`, `cod_cardapio`) VALUES
(33, 1, 10),
(36, 1, 11),
(63, 1, 13),
(64, 2, 13),
(65, 3, 13),
(72, 1, 14),
(73, 2, 14),
(74, 3, 14),
(75, 4, 14),
(76, 2, 15),
(77, 3, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comida`
--

CREATE TABLE IF NOT EXISTS `comida` (
  `id_comida` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_tipo` int(11) NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`id_comida`),
  KEY `cod_tipo` (`cod_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `comida`
--

INSERT INTO `comida` (`id_comida`, `nome`, `cod_tipo`, `preco`) VALUES
(1, 'petisco', 4, 5),
(2, 'salgados', 4, 5),
(3, 'bife a cavalo', 5, 25),
(4, 'pavÃª', 6, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_cardapio` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `cod_cardapio` (`cod_cardapio`),
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `nome`, `cod_cardapio`, `cod_usuario`) VALUES
(10, 'chris', 15, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_comida`
--

CREATE TABLE IF NOT EXISTS `tipo_comida` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tipo_comida`
--

INSERT INTO `tipo_comida` (`id_tipo`, `tipo`) VALUES
(4, 'entradas'),
(5, 'prato principal'),
(6, 'sobremesas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `permissao` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `permissao`) VALUES
(1, 'adm', 'adm@adm.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'amanda', 'amanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(3, 'christian5', 'as@as.com', '202cb962ac59075b964b07152d234b70', 3),
(4, 'jose', 'jose@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(5, 'jose', 'a@a.com', 'd41d8cd98f00b204e9800998ecf8427e', 3),
(6, 'lala', 'lala@lala.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(7, 'ana', 'ana@ana.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(8, 'luiza', 'l@l.com', '827ccb0eea8a706c4c34a16891f84e7b', 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cardapio_comida`
--
ALTER TABLE `cardapio_comida`
  ADD CONSTRAINT `cardapio_comida_ibfk_1` FOREIGN KEY (`cod_comida`) REFERENCES `comida` (`id_comida`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cardapio_comida_ibfk_2` FOREIGN KEY (`cod_cardapio`) REFERENCES `cardapio` (`id_cardapio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`cod_tipo`) REFERENCES `tipo_comida` (`id_tipo`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cod_cardapio`) REFERENCES `cardapio` (`id_cardapio`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
