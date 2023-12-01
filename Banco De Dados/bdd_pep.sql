-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2023 às 02:55
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdd_pep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `descricaoD` text NOT NULL,
  `efeito` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `gif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `habilidades`
--

INSERT INTO `habilidades` (`id`, `nome`, `descricao`, `descricaoD`, `efeito`, `tipo`, `img`, `gif`) VALUES
(0, 'Golpe de Sorte', 'Você se prepara e então ataca seu inimigo com um golpe direto.', 'Um habilidade simples cuja existência não está ligada a nenhum conteúdo.', '20', 'ATQ', 'GP.png', 'GP.gif'),
(1, 'Defesa Alta', 'Levanta os braços em frente ao rosto para se proteger dos ataques.', 'Um habilidade simples cuja existência não está ligada a nenhum conteúdo.', '20', 'DEF', 'DA.png', 'DA.gif'),
(2, 'Respirar Fundo', 'Você para por alguns instantes, respira fundo e então se prepara para voltar ao combate mais tranquilo.', 'Um habilidade simples cuja existência não está ligada a nenhum conteúdo.', '20\r\n', 'CURA', 'RF.png', 'RF.gif'),
(3, 'Estrondo Extrusivo', 'Você ergue as mãos para erguer a fúria da terra, fazendo com que rochas incandescentes irrompam da terra para lhe proteger.', 'Um habilidade ligada aos conteúdos de agentes do relevo, referente a: vulcanismo.', '30', 'DEF', 'EE.png', 'EE.gif'),
(4, 'Palmas Sismicas', 'Você bate as mãos com tamanho poder que um poderoso estrondo se espalha ferindo o inimigo.', 'Um habilidade ligada aos conteúdos de agentes do relevo, referente a: abalos sísmicos.', '40', 'ATQ', 'PS.png', 'PS.gif'),
(5, 'Dispersar Divergente', 'Você coloca as mãos na terra e então invoca poderosos tremores nos confins da terra, fazendo com que você e seu inimigo se afastem conforme a terra se abre e desestabiliza o oponente.', 'Um habilidade ligada aos conteúdos de agentes do relevo, referente a: tectonismo.', '0', 'DBUF', 'DD.png', 'DD.gif'),
(6, 'Visão Cardeal', 'Você se concentra para analisar seu inimigo, com isso, pequenos pontos cardeais surgem em seu corpo como fraquezas para serem exploradas.', 'Uma habilidade ligada aos conteúdos de cartografia.', '3', 'BUF', 'VC.png', 'VC.gif'),
(7, 'Golpe Latitudinal', 'Você ataca seu inimigo com um poderoso golpe horizontal que abala a área em vários graus.', 'Uma habilidade ligada aos conteúdos de cartografia.', '40', 'ATQ', 'GL.png', 'GL.gif'),
(8, 'Inversão Escalar', 'Você ergue as mãos em direção ao inimigo e então diminui a escala de seu ataque. ', 'Uma habilidade ligada aos conteúdos de cartografia.', '40', 'DEF', 'DE.png', 'DE.gif'),
(9, 'Nuvem na Cartola', 'Você leva as mãos aos céus para criar uma grande cartola(o que é uma cartola? você não sabe, mas este é certamente seu nome.) de nuvens: ', 'Uma habilidade ligada aos conteúdos de climatologia, referentes a: climatologia regional.', '0', 'ESP', 'NC.png', 'NC.gif'),
(10, 'Nuvem Massiva', 'Você ergue as mãos ao céu, então uma gigantesca nuvem carregada de trovões surge para atacar seu inimigo.', 'Uma habilidade ligada aos conteúdos de cartografia, referentes a: elementos climáticos.', '40', 'ATQ', 'NM.png', 'NM.gif'),
(11, 'Nuvens Aceleradas', 'Você joga suas mãos para frente fazendo com que surja uma poderosa lufada de vento que desestabiliza seu inimigo.', 'Uma habilidade ligada aos conteúdos de cartografia: climatologia dinâmica.', '0', 'DBUF', 'NA.png', 'NA.gif'),
(12, 'Golpe Duplo', 'Você ao respirar fundo e tendo se posicionado para atacar, após golpear seu inimigo, encaixa outro ataque certeiro.', '...', '50', 'ATQ', '...', '...'),
(13, 'Fúria dos Ventos', 'Ao esquentar a terra com as rochas magmáticas, criar ondas de ar frio com as nuvens sob os céus e então dispersar uma poderosa ventania um furacão gigantesco se forma acertando seu inimigo em cheio e o deixando muito ferido.', '...', '80', 'ATQ', '...', '...'),
(14, 'Ventos Congelantes', 'Ao escalar grandemente seu ataque horizontal, um vento frio surge congelando seu inimigo.', '...', '80', 'ATQ', '...', '...'),
(15, 'Terremoto Estrondoso', 'Ao criar diversos tremores, a atividade vulcânica gerada por eles é tão poderosa que um grande terremoto ocorre.', '...', '80', 'ATQ', '...', '...'),
(16, 'Magnitude Nove ', 'Ao inverter as escalas, um pequeno tremor se torna um terremoto de escalas catastroficas.', '...', '80', 'ATQ', '...', '...'),
(100, '...', 'Assim que me aproximei ele me atacou! droga, terei que para-lo antes de descobrir o que está acontecendo.', '...', '...', '...', '...', '...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia`
--

CREATE TABLE `historia` (
  `id` int(11) NOT NULL,
  `historia` text NOT NULL,
  `descricao` text NOT NULL,
  `inimigo` text NOT NULL,
  `GIF` varchar(255) NOT NULL,
  `IMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `historia`
--

INSERT INTO `historia` (`id`, `historia`, `descricao`, `inimigo`, `GIF`, `IMG`) VALUES
(1, 'Eu morri há algumas horas… de novo? Desde o meu encontro com aquele poderoso espírito, sinto que algo despertou dentro de mim. Sinto que não é a primeira vez que vejo este livro, que escrevo nele! Tornei-me uma espécie de espírito que viaja entre o tempo... Que bom, agora posso deter os guardiões! Na minha vida passada, ou em minhas vidas, os guardiões das terras — animais de poder inigualável com poderosos espíritos guerreiros dentro de si — foram corrompidos por algum estranho e poderoso ser maligno e antigo. Devo enfrentá-los e impedi-los de destruir minha terra e meus amigos mais uma vez.\r\n	O primeiro deles está próximo, o espírito dos ventos, Quero Tempestades, um pássaro que consegue controlar os céus e os ventos ao seu favor.\r\n	Minha nossa! eu não acreditei que fosse realmente possível deter ele, mas eu consegui e agora parece que algum tipo de energia está saindo de seu corpo, vou me aproximar para ver o que é… o que é isso? sinto que posso absorver este poder para mim.\r\n', '  O Pampa, integrante dos seis biomas brasileiros, com uma extensão de 193.836 km² no estado do Rio Grande do Sul, representa 69% do território estadual e 2,3% do território nacional, apresentando uma diversidade de ambientes. O Pampa desempenha um papel crucial na biodiversidade, abrigando milhares de espécies de plantas nativas. \r\nO bioma do Pampa é caracterizado por campos abertos, vegetação rasteira e relevo de coxilhas, abrigando uma fauna adaptada ao ambiente, como o veado-campeiro, o lobo-guará e diversas aves. Contudo, as atividades econômicas, como agricultura e pecuária, causaram transformações, tornando a conservação do Pampa uma preocupação crucial.\r\n', 'Quero Tempestades', 'QT.gif', 'MP.png'),
(2, 'Depois de derrotar o \'Quero Tempestades\' e absorver parte de seus poderes, sinto-me mais forte. Andei durante dias e semanas sem parar em busca do meu próximo inimigo. Talvez agora, que tenho os poderes do Espírito do Vento, eu possa derrotá-lo. O guardião destas terras úmidas é o \'Pedregulho Peludo\', um tatu gigantesco com os poderes do Espírito da Terra. Se eu derrotá-lo e conseguir absorver seus poderes, serei capaz de enfrentar os próximos guardiões que guardam ainda mais força em seu interior.\r\nEsta luta foi muito mais difícil, mas eu sinto o poder da terra sendo sugado para o interior do meu corpo, fico me perguntando se serei capaz de enfrentar os próximos… melhor eu continuar minha viagem, eu não tenho escolha, eu preciso vencer!\r\n', '  A Mata Atlântica, se estende pela costa brasileira, abrangendo 1,1 milhão de km² em dezessete estados, mas enfrenta uma significativa redução de sua cobertura original devido ao contínuo desmatamento e exploração de seus recursos. \r\nO Bioma é uma das regiões mais biodiversas do mundo, uma floresta tropical, vital para a produção e regulação de água, equilíbrio climático e proteção das encostas, além de apresentar um patrimônio histórico e cultural. A Mata Atlântica abriga mais de vinte mil espécies de árvores e arbustos. No entanto, 14,66% das espécies da fauna enfrentam ameaças de extinção, assim como 43% das espécies identificadas na flora, destacando como é importante e urgente a conservação deste ecossistema.\r\nApesar dos constantes problemas como a urbanização, a expansão agrícola e o desmatamento histórico, iniciativas de conservação buscam preservar e recuperar este bioma tão vital e importante para o Brasil. A Mata Atlântica não apenas representa um patrimônio natural, mas é crucial para garantir um equilíbrio ambiental sustentável e a sobrevivência das inúmeras espécies.\r\n', 'Pedregulho Peludo', 'PP.gif', 'MM.png'),
(3, 'Meu Deus, eu não aguento mais andar. Parece que já se passaram semanas desde que enfrentei o último guardião. Sair daquela floresta demorou muito tempo, mas eu daria qualquer coisa para voltar para ela. O clima aqui é muito mais difícil, seco e quente. Mal consigo encontrar água. Me pergunto como o espírito guia consegue viver por aqui. Isso não importa; preciso achá-lo e vencê-lo se quiser encontrar o caminho certo para as terras ancestrais. Com seus poderes, poderei me guiar dentro daquele gigantesco labirinto natural e achar o culpado por trás de tudo isso.\r\n	Finalmente eu consegui o derrotar, o “Atlas Pintado” era muito poderoso e sua capacidade de se espreitar e me atacar nos pontos mais vulneráveis tornaram esta luta muito mais difícil do que eu poderia imaginar… mas eu o derrotei! agora, com seus poderes, seguirei em diante para encontrar ele…\r\n', '  A Caatinga abrange 11% do território nacional nos estados nordestinos de Alagoas, Bahia, Ceará, Maranhão, Pernambuco, Paraíba, Rio Grande do Norte, Piauí, Sergipe e no norte de Minas Gerais. Destaca-se por sua biodiversidade, que inclui mais de 1.400 espécies entre mamíferos, aves, peixes, répteis, entre outros.\r\nSua vegetação é adaptada às condições de seca, escassez de água e concentração das chuvas graças às características climáticas semiáridas que apresentam grandes temperaturas e baixa umidade. As plantas possuem estratégias como folhas modificadas, espinhos e caules suculentos para minimizar a perda de água, suas paisagens são variadas e inconstantes, mudando de região para região, podendo apresentar locais áridos e pedregosos, locais com uma densa vegetação, áreas mais abertas ou leitos de rios sazonais.\r\n', 'Atlas Pintado', 'AP.gif', 'MC.png'),
(4, '\"Com os poderes do guia, vou ser capaz de andar tranquilamente por aqui\", eu disse. \"Com essas habilidades, poderei encontrar o Espírito Maligno\", eu disse. Maldição! Estou andando há dias e não consigo encontrá-lo por nada. Passei por algumas tribos devastadas pelos seus poderes, e ainda que eu persiga seu rastro, parece que ele sempre foge no último instante. Mais alguns dias se passaram desde que escrevi a última parte, e acho que descobri uma forma de encontrar o Espírito. Alguns irmãos que encontrei durante minhas buscas me contaram sobre um poderoso Guardião chamado de \"Roedor Ancião\". Ele é um protetor inigualável. Com sua ajuda, poderei não só achar o Espírito Maligno como também derrotá-lo de uma vez por todas.\r\nSeu ataque repentino me pegou desprevenido, mas eu consegui derrotá-lo, agora só preciso descobrir o porquê dele me atacar.\r\nO Protetor Ancião foi o responsável por toda aquela tragédia, ele foi o primeiro a ser corrompido, não posso acreditar que alguém tão poderoso quanto ele perdeu para o espírito maligno… mas tem algo estranho, não consigo absorver os poderes do Roedor e ele… ele está se levantando? mas sua energia está mais densa e seus olhos mudaram.\r\nO Espírito Maligno havia possuído o corpo do Roedor Ancião. Como eu finalmente o derrotei, a corrupção deve parar de se espalhar por estas terras. Agora que tenho esses poderes dos antigos guardiões, minha missão será a deles. Protegerei estas terras até o fim de minha vida.\r\n', '  A Amazônia, maior bioma do Brasil e maior floresta tropical global, abrange 4,2 milhões de km² com mais de 2.500 espécies de árvores e mais de 30 mil espécies de plantas, uma fauna rica em biodiversidade e de extrema importância. A bacia amazônica, a maior do mundo, possui 6 milhões de km². Calcula-se que o Rio Amazonas despeja cerca de 175 milhões de litros de água por segundo no Oceano Atlântico. Além dos recursos naturais como madeira, borracha e castanha, a região preserva uma rica herança cultural. \r\nSeu clima é equatorial úmido caracterizado por altas temperaturas e alta umidade. A Amazônia é essencial para o equilíbrio climático global e influencia ecossistemas pelo mundo todo, com características geográficas únicas. Contudo, enfrenta grandes ameaças devido à ação humana, colocando em risco sua sensível ecologia enquanto alerta o cenário global para as repercussões severas no meio ambiente que sua degradação pode causar.\r\n', 'Roedor Ancião.', 'RA.gif', 'MA.png'),
(5, 'História Final#2', '  A Amazônia, maior bioma do Brasil e maior floresta tropical global, abrange 4,2 milhões de km² com mais de 2.500 espécies de árvores e mais de 30 mil espécies de plantas, uma fauna rica em biodiversidade e de extrema importância. A bacia amazônica, a maior do mundo, possui 6 milhões de km². Calcula-se que o Rio Amazonas despeja cerca de 175 milhões de litros de água por segundo no Oceano Atlântico. Além dos recursos naturais como madeira, borracha e castanha, a região preserva uma rica herança cultural. \r\nSeu clima é equatorial úmido caracterizado por altas temperaturas e alta umidade. A Amazônia é essencial para o equilíbrio climático global e influencia ecossistemas pelo mundo todo, com características geográficas únicas. Contudo, enfrenta grandes ameaças devido à ação humana, colocando em risco sua sensível ecologia enquanto alerta o cenário global para as repercussões severas no meio ambiente que sua degradação pode causar.\r\n', 'Roedor Ancião Submerso', 'RAS.gif', 'RAS.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `pontos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`id`, `nome`, `email`, `senha`, `pontos`) VALUES
(1, 'DM', 'root', '$2y$10$tBSlJ4kfKZhxlaxJmz361.vUkGHxD0fRm/feua1QhGKKKjDhY31wq', 2110),
(2, 'JogadorTeste#1', 'jogUm@mail.com', '$2y$10$tJyEv.Adb5oYi2AQKdmaXePLvePVZ6ucbkkBfocBXiknMjw/SiKH6', 100),
(3, 'JogadorTeste#2', 'jogDois@mail.com', '$2y$10$OfxQOnTMUnsH1vls3lqUhOYfHfV/JFo0rDcRu8iJkVC.Qs936dgOW', 50),
(4, 'JogadorTestes#3', 'jogTres@mail.com', '$2y$10$qqFjw.cdEk0kgp7PbORGvewO4BYUwGu4j0NXbieZUirH3FhtTUZJy', 0),
(5, 'JogadorTeste#4', 'jogQuatro@mail.com', '$2y$10$O/5oZEYqJuiFr.Uz4Ko3LO0YosxLo8LB1IVnULki07iyQARg8lu5C', 500),
(6, 'JogadorTeste#5', 'jogCinco@mail.com', '$2y$10$evPRaSaktrjsw42.p5Qtgu8VFCxoZR5P1j8F7F1OpGZfaSW44eekC', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jog_hab`
--

CREATE TABLE `jog_hab` (
  `id_jog` int(11) NOT NULL,
  `id_hab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jog_hab`
--

INSERT INTO `jog_hab` (`id_jog`, `id_hab`) VALUES
(1, 0),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(4, 0),
(4, 1),
(4, 2),
(5, 0),
(5, 1),
(5, 2),
(5, 3),
(5, 5),
(5, 9),
(5, 10),
(6, 0),
(6, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `padraoinimigo`
--

CREATE TABLE `padraoinimigo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `p2` varchar(255) NOT NULL,
  `p3` varchar(255) NOT NULL,
  `p4` varchar(255) NOT NULL,
  `p5` varchar(255) NOT NULL,
  `p6` varchar(255) NOT NULL,
  `p7` varchar(255) NOT NULL,
  `p8` varchar(255) NOT NULL,
  `p9` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `padraoinimigo`
--

INSERT INTO `padraoinimigo` (`id`, `nome`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`) VALUES
(1, 'Quero Tempestade', 'ATQ', 'ATQ', 'ATQ', 'DEF', 'ATQ', 'ATQ', 'ATQ', 'DEF', 'DBUF'),
(2, 'Pedregulho Peludo', 'ATQ', 'ATQ', 'ATQ', 'CURA', 'ATQ', 'ATQ', 'ATQ', 'CURA', 'ESP'),
(3, 'Atlas Pintado', 'ATQ', 'ATQ', 'ATQ', 'ATQCRIT', 'ATQ', 'ATQ', 'ATQ', 'ATQCRIT', 'CURA'),
(4, 'Roedor Ancião V1', 'ATQ', 'ATQ', 'ATQ', 'CURA', 'DEF', 'ATQ', 'ATQ', 'ATQ', 'CURA'),
(5, 'Roedor Ancião V2', 'ATQ', 'ATQ', 'ATQCRIT', 'ATQ', 'ATQ', 'ATQCRIT', 'ATQ', 'ATQ', 'ATQCRIT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `progresso`
--

CREATE TABLE `progresso` (
  `id` int(11) NOT NULL,
  `id_jog` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `progresso`
--

INSERT INTO `progresso` (`id`, `id_jog`, `nivel`) VALUES
(1, 1, 4),
(2, 2, 1),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jog_hab`
--
ALTER TABLE `jog_hab`
  ADD UNIQUE KEY `id_jog` (`id_jog`,`id_hab`),
  ADD KEY `fk_hab` (`id_hab`);

--
-- Índices para tabela `padraoinimigo`
--
ALTER TABLE `padraoinimigo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `progresso`
--
ALTER TABLE `progresso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_jog` (`id_jog`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `historia`
--
ALTER TABLE `historia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `progresso`
--
ALTER TABLE `progresso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `jog_hab`
--
ALTER TABLE `jog_hab`
  ADD CONSTRAINT `fk_hab` FOREIGN KEY (`id_hab`) REFERENCES `habilidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jog` FOREIGN KEY (`id_jog`) REFERENCES `jogador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `progresso`
--
ALTER TABLE `progresso`
  ADD CONSTRAINT `fk_progJog` FOREIGN KEY (`id_jog`) REFERENCES `jogador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
