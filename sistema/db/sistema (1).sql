-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2014 às 13:49
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(7, 'SalÃ¡rios'),
(8, 'Aluguel/Financiamento'),
(9, 'AlimentaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE IF NOT EXISTS `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `saldoInicial` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `nome`, `saldoInicial`) VALUES
(2, 'BANCO HSBC', '100.00'),
(3, 'CAIXA ECONIMICA', '3000.00'),
(4, 'CARTEIRA', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamento`
--

CREATE TABLE IF NOT EXISTS `lancamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataLancamento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `tipo` char(1) NOT NULL DEFAULT 'D',
  `situacao` char(1) NOT NULL DEFAULT 'A',
  `vencimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_conta` (`id_conta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `lancamento`
--

INSERT INTO `lancamento` (`id`, `dataLancamento`, `descricao`, `valor`, `id_categoria`, `id_conta`, `tipo`, `situacao`, `vencimento`) VALUES
(1, '2014-12-06 11:44:45', 'Testes do sistema', '100.00', 7, 2, 'D', 'A', '2014-12-06 11:44:45'),
(2, '2014-12-06 12:04:11', 'Salario mes 12', '5000.00', 7, 2, 'R', 'P', '2014-12-06 12:04:11'),
(3, '2014-12-06 02:00:00', 'Testando o sistema ', '400.00', 8, 2, 'D', 'A', '2014-06-12 03:00:00'),
(4, '2014-12-06 02:00:00', 'Supermercado semanal', '150.00', 9, 4, 'D', 'P', '2014-06-12 03:00:00'),
(5, '2014-12-06 02:00:00', 'Padaria', '30.00', 9, 4, 'D', 'P', '2014-06-12 03:00:00'),
(6, '2014-12-06 02:00:00', 'Website desenvolvido', '3000.00', 7, 3, 'R', 'P', '2014-06-12 03:00:00'),
(7, '2014-12-06 02:00:00', 'Teste', '8000.00', 8, 2, 'D', 'P', '2014-12-06 02:00:00'),
(8, '2014-12-06 02:00:00', 'REceita teste', '5000.00', 7, 2, 'R', 'P', '2014-12-06 02:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Administrador', 'admin', 'admin');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `lancamento`
--
ALTER TABLE `lancamento`
  ADD CONSTRAINT `lancamento_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `lancamento_ibfk_2` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
