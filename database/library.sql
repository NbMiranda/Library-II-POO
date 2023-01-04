-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 22-Dez-2022 às 18:18
-- Versão do servidor: 5.7.40
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `library`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(45) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `writer_id` int(11) DEFAULT NULL,
  `sinopse` text,
  `other_genre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `books`
--

INSERT INTO `books` (`id`, `book_name`, `genre`, `writer_id`, `sinopse`, `other_genre`) VALUES
(1, 'Percy Jackson e o Ladrao de Raios', 'Ficcao', 1, 'Primeiro volume da saga Percy Jackson e os olimpianos, O ladrÃ£o de raios esteve entre os primeiros lugares na lista das sÃ©ries mais vendidas do The New York Times. O autor conjuga lendas da mitologia grega com aventuras no sÃ©culo XXI. Nelas, os deuses do Olimpo continuam vivos, ainda se apaixonam por mortais e geram filhos metade deuses, metade humanos, como os herÃ³is da GrÃ©cia antiga. Marcados pelo destino, eles dificilmente passam da adolescÃªncia. Poucos conseguem descobrir sua identidade.O garoto-problema Percy Jackson Ã© um deles. Tem experiÃªncias estranhas em que deuses e monstros mitolÃ³gicos parecem saltar das pÃ¡ginas dos livros direto para a sua vida. Pior que isso: algumas dessas criaturas estÃ£o bastante irritadas. Um artefato precioso foi roubado do Monte Olimpo e Percy Ã© o principal suspeito. Para restaurar a paz, ele e seus amigos â€“ jovens herÃ³is modernos â€“ terÃ£o de fazer mais do que capturar o verdadeiro ladrÃ£o: precisam elucidar uma traiÃ§Ã£o mais ameaÃ§adora que fÃºria dos deuses.Best-seller da Veja', 'Mitologia grega, Romance, Literatura fantastica'),
(2, 'Percy Jackson e o Mar de Monstros', 'Ficcao', 1, 'Nessa segunda aventura da sÃ©rie Percy Jackson e os olimpianos, Percy e seus amigos estÃ£o em busca do Velocino de Ouro, Ãºnico artefato mÃ¡gico capaz de proteger da destruiÃ§Ã£o seu lugar predileto e, atÃ© entÃ£o, o mais seguro do mundo: o Acampamento Meio-Sangue.\r\n\r\nCom o envenenamento da Ã¡rvore de Thalia por um inimigo misterioso, as fronteiras mÃ¡gicas que protegem o Acampamento estÃ£o ameaÃ§adas, e Ã© preciso buscar o antÃ­doto. As coordenadas da missÃ£o -30-31-75-12 - sÃ£o uma referÃªncia ao TriÃ¢ngulo das Bermudas, no temido Mar de Monstros.\r\n\r\nUma jornada que colocarÃ¡ Ã  prova a heranÃ§a de nossos herÃ³is - quando Percy irÃ¡ questionar se ser filho de Poseidon Ã© uma honra ou uma terrÃ­vel maldiÃ§Ã£o.', 'Mitologia grega, Romance, Literatura fantastica'),
(3, 'Percy Jackson MaldiÃ§Ã£o do Tita', 'Ficcao', 1, 'Um monstro ancestral foi despertado - um ser com poder suficiente para destruir o Olimpo -, e Ãrtemis, a Ãºnica deusa capaz de encontrÃ¡-lo, desapareceu. Percy e seus amigos tÃªm apenas uma semana para resgatar a deusa sequestrada e solucionar o mistÃ©rio que ronda o monstro que ela caÃ§ava.', 'Mitologia grega, Romance, Literatura fantastica'),
(4, 'Harry Potter e a Camara Secreta', 'Ficcao', 2, 'O livro se envolve em torno da lenda de uma cÃ¢mara secreta localizada na Escola de Magia e Bruxaria de Hogwarts, na qual abriga um monstro que matarÃ¡ a todos os bruxos que nÃ£o provÃ©m de famÃ­lias mÃ¡gicas.', 'Aventura, Alta fantasia'),
(5, 'Harry Potter e o Calice de Fogo ', 'Ficcao', 2, 'Harry Ã© escolhido pelo CÃ¡lice de Fogo para competir como um dos campeÃµes de Hogwarts, tendo ao lado seus fiÃ©is amigos. Muitos desafios, feitiÃ§os, poÃ§Ãµes e confusÃµes estÃ£o reservados para Harry. AlÃ©m disso, ele terÃ¡ que lidar ainda com os problemas comuns da adolescÃªncia amor, amizade, aceitaÃ§Ã£o e rejeiÃ§Ã£o.', 'Aventura, Alta fantasia, Romance, Magico'),
(6, 'Harry Potter e as Reliquias da Morte ', 'Ficcao', 2, 'Voldemorte estÃ¡ cada vez mais forte e Harry Potter precisa encontrar e aniquilar as Horcruxes para enfraquecer o lorde e poder enfrentÃ¡-lo. Nessa busca desenfreada, contando apenas com os amigos Rony e Hermione, Harry descobre as RelÃ­quias da Morte, que serÃ£o Ãºteis na batalha do bem contra o mal.', 'Aventura, Alta fantasia, Misterio, Magico'),
(7, 'O Senhor dos Aneis', 'Ficcao', 3, 'Em uma terra fantÃ¡stica e Ãºnica, um hobbit recebe de presente de seu tio um anel mÃ¡gico e maligno que precisa ser destruÃ­do antes que caia nas mÃ£os do mal. Para isso, o hobbit Frodo tem um caminho Ã¡rduo pela frente, onde encontra perigo, medo e seres bizarros. Ao seu lado para o cumprimento desta jornada, ele aos poucos pode contar com outros hobbits, um elfo, um anÃ£o, dois humanos e um mago, totalizando nove seres que formam a Sociedade do Anel.', 'Literatura fantastica, Alta fantasia, Heroico'),
(8, 'O Hobbit', 'Romance', 3, 'O Hobbit conta a histÃ³ria de Bilbo Bolseiro, um Hobbit pacato e satisfeito cuja vida vira de cabeÃ§a para baixo quando ele se junta ao mago Gandalf e a treze anÃµes em sua jornada para reaver um tesouro roubado.', 'Epico, Literatura fantastica, Fantasia'),
(9, 'A guerra dos Tronos', 'Romance', 4, 'A guerra dos tronos Ã© o primeiro livro da sÃ©rie best-seller internacional As CrÃ´nicas de Gelo e Fogo, que deu origem Ã  adaptaÃ§Ã£o de sucesso da HBO, Game of Thrones.\r\nO verÃ£o pode durar dÃ©cadas. O inverno, toda uma vida. E a guerra dos tronos comeÃ§ou. Como GuardiÃ£o do Norte, lorde Eddard Stark nÃ£o fica feliz quando o rei Robert o proclama a nova MÃ£o do Rei. Sua honra o obriga a aceitar o cargo e deixar seu posto em Winterfell para rumar para a corte, onde os homens fazem o que lhes convÃ©m, nÃ£o o que devem... e onde um inimigo morto Ã© algo a ser admirado.\r\n\r\nLonge de casa e com a famÃ­lia dividida, Eddard se vÃª cada vez mais enredado nas intrigas mortais de Porto Real, sem saber que perigos ainda maiores espreitam a distÃ¢ncia.\r\n\r\nNas florestas ao norte de Winterfell, forÃ§as sobrenaturais se espalham por trÃ¡s da Muralha que protege a regiÃ£o. E, nas Cidades Livres, o jovem Rei DragÃ£o exilado na RebeliÃ£o de Robert planeja sua vinganÃ§a e deseja recuperar sua heranÃ§a de famÃ­lia: o Trono de Ferro de Westeros.', 'Literatura Fantastica, Alta fantasia'),
(10, 'Fogo & Sangue', 'Ficcao', 4, 'A histÃ³ria de Fogo & Sangue comeÃ§a com o lendÃ¡rio Aegon, o Conquistador, criador do Trono de Ferro, e segue narrando as geraÃ§Ãµes de Targaryen que lutaram para manter o assento, atÃ© a guerra civil que quase destruiu sua dinastia.', 'Literatura fantastica, Alta fantasia'),
(11, 'Harry Potter e o Prisioneiro de Azkaban', 'Romance', 2, 'ApÃ³s ser acusado de ter entregue os Potter a Voldemort e matado treze trouxas e seu ex-amigo, Black Ã© condenado a prisÃ£o perpÃ©tua, sendo aprisionado na prisÃ£o de Azkaban. ApÃ³s treze anos, ele foge da prisÃ£o para, como todos acreditavam, matar Harry em nome de Voldemort.', 'Literatura Fantastica'),
(12, 'It a Coisa', 'Ficcao', 5, 'Durante as fÃ©rias de 1958, em uma pacata cidadezinha chamada Derry, um grupo de sete amigos comeÃ§a a ver coisas estranhas. Um conta que viu um palhaÃ§o, outro que viu uma mÃºmia. Finalmente, acabam descobrindo que estavam todos vendo a mesma coisa: um ser sobrenatural e maligno que pode assumir vÃ¡rias formas.', 'Suspense, Fantasia sombria'),
(13, 'Doutor sono', 'Terror', 5, 'Na infÃ¢ncia, Danny Torrance sobreviveu a uma tentativa de homicÃ­dio por parte do pai, um escritor perturbado pelos espÃ­ritos malignos do Hotel Overlook. JÃ¡ adulto, traumatizado e alcoÃ³latra. Danny se estabelece em uma pequena cidade, onde consegue um emprego no hospital local. Sua paz, porÃ©m, estÃ¡ com os dias contados a partir de quando cria um vÃ­nculo telepÃ¡tico com Abra, uma menina com poderes tÃ£o fortes quanto aqueles que ele bloqueia dentro de si.', 'Fantasia, Suspense, Drama'),
(14, 'O Iluminado', 'Terror', 5, 'â€œO lugar perfeito para recomeÃ§arâ€, Ã© o que pensa Jack Torrance ao ser contratado como zelador para o inverno. Hora de deixar para trÃ¡s o alcoolismo, os acessos de fÃºria, os repetidos fracassos. Isolado pela neve com a esposa e o filho, tudo o que Jack deseja Ã© um pouco de paz para se dedicar Ã  escrita. Mas, conforme o inverno se aprofunda, o local paradisÃ­aco comeÃ§a a parecer cada vez mais remoto... e mais sinistro. ForÃ§as malignas habitam o Overlook, e tentam se apoderar de Danny Torrance, um garotinho com grandes poderes sobrenaturais. Possuir o menino, no entanto, se mostra mais difÃ­cil do que esperado. EntÃ£o os espÃ­ritos resolvem se aproveitar das fraquezas do pai... Um dos livros mais assustadores de todos os tempos, O iluminado Ã© um clÃ¡ssico de Stephen King. EdiÃ§Ã£o especial com traduÃ§Ã£o revisada e prÃ³logo e epÃ­logo inÃ©ditos.', 'MistÃ©rio, Sobrenatural'),
(15, 'Carrie a Estranha', 'Terror', 5, 'Carrie Ã© uma adolescente tÃ­mida e solitÃ¡ria. Aos 16 anos, Ã© completamente dominada pela mÃ£e, uma fanÃ¡tica religiosa que reprime todas as vontades e descobertas normais aos jovens de sua idade. Para Carrie, tudo Ã© pecado. Viver Ã© enfrentar todo dia o terrÃ­vel peso da culpa. Para os colegas de escola, e atÃ© para os professores, Carrie Ã© uma garota estranha, incapaz de conviver com os outros. Cada vez mais isolada, ela sofre com o sarcasmo e o deboche dos colegas. No entanto, hÃ¡ um segredo por trÃ¡s de sua aparÃªncia frÃ¡gil: Carrie tem poderes sobrenaturais, Ã© capaz de mover objetos com a mente. No dia de sua formatura, Carrie Ã© surpreendida pelo convite de Tommy para a festa - algo que lhe dÃ¡ a chance de se enxergar de outra forma pela primeira vez. O ato de crueldade que acontece naquele salÃ£o, porÃ©m, dÃ¡ inÃ­cio a uma reviravolta cheia de terror e destruiÃ§Ã£o. Chegou a hora do acerto de contas. Carrie, a estranha Ã© um dos maiores clÃ¡ssicos de terror da literatura contemporÃ¢nea e um dos livros mais aclamados de Stephen King.', 'Drama, Suspense'),
(16, 'A Menina que Roubava Livros', 'Romance', 6, 'A trajetÃ³ria de Liesel Meminger Ã© contada por uma narradora mÃ³rbida, surpreendentemente simpÃ¡tica. Ao perceber que a pequena ladra de livros lhe escapa, a Morte afeiÃ§oa-se Ã  menina e rastreia suas pegadas de 1939 a 1943.\r\n\r\nTraÃ§os de uma sobrevivente: a mÃ£e comunista, perseguida pelo nazismo, envia Liesel e o irmÃ£o para o subÃºrbio pobre de uma cidade alemÃ£, onde um casal se dispÃµe a adotÃ¡-los por dinheiro. O garoto morre no trajeto e Ã© enterrado por um coveiro que deixa cair um livro na neve. Ã‰ o primeiro de uma sÃ©rie que a menina vai surrupiar ao longo dos anos. O Ãºnico vÃ­nculo com a famÃ­lia Ã© esta obra, que ela ainda nÃ£o sabe ler.\r\n\r\nAssombrada por pesadelos, ela compensa o medo e a solidÃ£o das noites com a conivÃªncia do pai adotivo, um pintor de parede bonachÃ£o que lhe dÃ¡ liÃ§Ãµes de leitura. Alfabetizada sob vistas grossas da madrasta, Liesel canaliza urgÃªncias para a literatura. Em tempos de livros incendiados, ela os furta, ou os lÃª na biblioteca do prefeito da cidade.\r\n\r\nA vida ao redor Ã© a pseudo-realidade criada em torno do culto a Hitler na Segunda Guerra. Ela assiste Ã  eufÃ³rica celebraÃ§Ã£o do aniversÃ¡rio do FÃ¼hrer pela vizinhanÃ§a. Teme a dona da loja da esquina, colaboradora do Terceiro Reich. Faz amizade com um garoto obrigado a integrar a Juventude Hitlerista. E ajuda o pai a esconder no porÃ£o um judeu que escreve livros artesanais para contar a sua parte naquela HistÃ³ria. A Morte, perplexa diante da violÃªncia humana, dÃ¡ um tom leve e divertido Ã  narrativa deste duro confronto entre a infÃ¢ncia perdida e a crueldade do mundo adulto, um sucesso absoluto - e raro - de crÃ­tica e pÃºblico', 'FicÃ§Ã£o juvenil, FicÃ§Ã£o histÃ³rica, Bildungsroman'),
(17, 'Diario de um Banana', 'Humor', 7, ' NÃ£o Ã© fÃ¡cil ser crianÃ§a. E ninguÃ©m sabe disso melhor do que Greg Heffley, que se vÃª mergulhado no mundo do ensino fundamental, onde fracotes sÃ£o obrigados a dividir os corredores com garotos mais altos, mais malvados e que jÃ¡ se barbeiam. Em DiÃ¡rio de um Banana, o autor e ilustrador Jeff Kinney nos apresenta um herÃ³i improvÃ¡vel. Como Greg diz em seu diÃ¡rio: SÃ³ nÃ£o espere que seja todo â€œQuerido DiÃ¡rioâ€ isso, â€œQuerido DiÃ¡rioâ€ aquilo.\r\nPara nossa sorte, o que Greg Heffley diz que farÃ¡ e o que ele realmente faz sÃ£o duas coisas bem diferentes.', 'Comedia, FicÃ§Ã£o juvenil'),
(18, 'Diario de um Bananna Rodrick e o cara', 'Humor', 7, 'Greg continua se metendo em confusÃ£o. SÃ³ que desta vez as coisas pioram - Rodrick, seu irmÃ£o, sabe de um incidente que Greg quer manter em sigilo. Mas segredos sÃ£o difÃ­ceis de serem guardados, especialmente quando hÃ¡ um diÃ¡rio envolvido.', 'Comedia, FicÃ§Ã£o juvenil'),
(19, 'Diario de um Bananna Dias de Cao', 'Humor', 7, 'FÃ©rias de verÃ£o - o tempo estÃ¡ lindo, e toda a garotada estÃ¡ se divertindo ao ar livre. Onde estÃ¡ Greg Heffley? Dentro de sua casa, jogando videogame com as cortinas fechadas. Greg, um \"caseiro\" assumido, estÃ¡ vivendo sua derradeira fantasia de verÃ£o: nada de responsabilidades e regras. Mas a mÃ£e do Greg tem uma visÃ£o diferente para um verÃ£o ideal... muitas atividades fora de casa e \"uniÃ£o de famÃ­lia\".', 'Comedia, FicÃ§Ã£o juvenil'),
(20, 'Outsider', 'Terror', 5, 'O corpo de um menino de onze anos Ã© encontrado abandonado no parque de Flint City, brutalmente assassinado. Testemunhas e impressÃµes digitais apontam o criminoso como uma das figuras mais conhecidas da cidade â€• Terry Maitland, treinador da Liga Infantil de beisebol, professor de inglÃªs, casado e pai de duas filhas.', 'Suspense, Romance, Misterio'),
(24, 'Harry Potter e o Enigma do PrÃ­ncipe', 'Romance', 2, 'Harry Potter e o enigma do PrÃ­ncipe dÃ¡ continuidade Ã  saga do jovem bruxo Harry Potter a partir do ponto onde o livro anterior parou, o momento em que fica provado que o poder de Voldemort e dos Comensais da Morte, seus seguidores, cresce mais a cada dia, em meio Ã  batalha entre o bem e o mal.', 'Aventura, Ficcao juvenil, Literatura fantastica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `book_genres`
--

CREATE TABLE `book_genres` (
  `id` int(11) NOT NULL,
  `book_genres` varchar(50) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `employer_name` varchar(30) NOT NULL,
  `position` varchar(45) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `genre` enum('M','F') DEFAULT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `employers`
--

INSERT INTO `employers` (`id`, `employer_name`, `position`, `phone_number`, `genre`, `birth_date`) VALUES
(1, 'José Vilas Boas', 'Manager', '14123456789', 'M', '1976-08-23'),
(2, 'Amanda Cristina', 'trainee', '1111', 'F', '2005-10-20'),
(3, 'Cristopher Nolan', 'Owner', '22222', 'M', '1970-07-30'),
(4, 'George Romero', 'Vice Manager', '33333', 'M', '1977-04-02'),
(5, 'Nayara da Silva', 'hired', '3442433', 'F', '2000-07-10'),
(6, 'Cecilia Ferreira', 'hired', '3442433', 'F', '2002-02-18'),
(7, 'Debora Guimarães', 'hired', '123334545', 'F', '1999-07-31'),
(8, 'Matheus Mendes', 'hired', ' 9987224', 'M', '2000-05-28'),
(9, 'Bruno Lopes', 'hired', '23242409', 'M', '2000-07-29'),
(10, 'João Pedro', 'hired', '98234729', 'M', '2003-05-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `person_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `cpf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `people`
--

INSERT INTO `people` (`id`, `person_name`, `phone_number`, `employer_id`, `profession`, `cpf`) VALUES
(1, 'Romero Brito', NULL, 2, NULL, 1111111),
(2, 'Vinicius Dias', NULL, 2, NULL, 222323),
(3, 'Regina Martins', NULL, 2, NULL, 3234334),
(4, 'Matheus Henrique', NULL, 10, NULL, 3423423),
(5, 'Roger Guedes', NULL, 6, NULL, 6436364),
(6, 'Claudia Machado', NULL, 2, NULL, 1231259),
(7, 'Paulo Ferreira', NULL, 4, NULL, 232452),
(8, 'Maria da Silva', NULL, 2, NULL, 23334827),
(9, 'Santiago Lima', NULL, 10, NULL, 89457361),
(10, 'Pedro Miguel', NULL, 5, NULL, 92837476);

-- --------------------------------------------------------

--
-- Estrutura da tabela `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`) VALUES
(1, 'LeYa'),
(2, 'Rocco'),
(3, 'Intrínseca'),
(4, 'HarperCollins'),
(5, 'Suma'),
(6, 'Intrínseca'),
(7, 'VR Editora');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `rent_date` date DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rentals`
--

INSERT INTO `rentals` (`id`, `rent_date`, `person_id`, `book_id`) VALUES
(1, '2022-05-05', 5, 10),
(2, '2022-06-11', 7, 2),
(3, '2022-06-19', 4, 4),
(4, '2022-06-27', 3, 9),
(5, '2022-06-27', 3, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `writer_name` varchar(45) NOT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `writers`
--

INSERT INTO `writers` (`id`, `writer_name`, `phone_number`, `email`) VALUES
(1, 'Rick Riordan', NULL, NULL),
(2, 'J. K. Rowling', NULL, NULL),
(3, 'J. R. R. Tolkien', NULL, NULL),
(4, 'George R. R. Martin', NULL, NULL),
(5, 'Stephen King', NULL, NULL),
(6, 'Markus zusak', NULL, NULL),
(7, 'Jeff Kinney', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `writer_publisher`
--

CREATE TABLE `writer_publisher` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `publisher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `writer_publisher`
--

INSERT INTO `writer_publisher` (`id`, `writer_id`, `publisher_id`) VALUES
(13, 1, 3),
(14, 2, 2),
(15, 3, 4),
(16, 4, 1),
(17, 5, 5),
(18, 6, 6),
(19, 7, 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer_id` (`writer_id`),
  ADD KEY `genre_index` (`genre`);

--
-- Índices para tabela `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Índices para tabela `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Índices para tabela `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writers_index` (`writer_name`);

--
-- Índices para tabela `writer_publisher`
--
ALTER TABLE `writer_publisher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer_id` (`writer_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `writer_publisher`
--
ALTER TABLE `writer_publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);

--
-- Limitadores para a tabela `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Limitadores para a tabela `writer_publisher`
--
ALTER TABLE `writer_publisher`
  ADD CONSTRAINT `writer_publisher_ibfk_1` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`),
  ADD CONSTRAINT `writer_publisher_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
