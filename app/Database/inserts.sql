INSERT INTO `psi_pl2_pws_e`.`empresas` VALUES (null, 'Caixas Limitadas', 'caixas@caixa.pt', '211852741', '505852147', 'Rua António Vieira', '2165-123', 'Fatima', '100000');

INSERT INTO `psi_pl2_pws_e`.`users` VALUES (null, 'admin', sha1('admin'), 'admin@fatura.pt', '963852741', '255147963', 'Rua das Ruas', '3214-045', 'Lisboa', 'administrador');
INSERT INTO `psi_pl2_pws_e`.`users` VALUES (null, 'diogo', sha1('diogo'), 'diogo@fatura.pt', '916108257', '255258741', 'Rua dos Parceiros', '2400-441', 'Leiria', 'funcionario');
INSERT INTO `psi_pl2_pws_e`.`users` VALUES (null, 'fernando', sha1('fernando'), 'fernando@fatura.pt', '96257471', '256874158', 'Praceta Actor Mário Viegas', '2005-517', 'Santarém', 'funcionario');
INSERT INTO `psi_pl2_pws_e`.`users` VALUES (null, 'marco', sha1('marco'), 'marco@fatura.pt', '921587469', '256999874', 'Rua do Brejo', '2430-185', 'Marinha Grande', 'funcionario');
INSERT INTO `psi_pl2_pws_e`.`users` VALUES (null, 'joao', sha1('joao'), 'joao@fatura.pt', '921987321', '256052874', 'Rua dos Olivais', '3040-123', 'Coimbra', 'cliente');
INSERT INTO `psi_pl2_pws_e`.`users` VALUES (null, 'antonio', sha1('antonio'), 'antonio@fatura.pt', '921587412', '256379874', 'Rua da Saudade', '1458-023', 'Lisboa', 'cliente');
INSERT INTO `psi_pl2_pws_e`.`users` VALUES (null, 'jorge', sha1('jorge'), 'jorge@fatura.pt', '921698745', '256141874', 'Rua do Sinal', '5010-140', 'Porto', 'cliente');

INSERT INTO `psi_pl2_pws_e`.`ivas` VALUES (null, '23', 'Taxa Normal', '1');
INSERT INTO `psi_pl2_pws_e`.`ivas` VALUES (null, '13', 'Taxa Intermédia', '1');
INSERT INTO `psi_pl2_pws_e`.`ivas` VALUES (null, '6', 'Taxa Reduzida', '1');
INSERT INTO `psi_pl2_pws_e`.`ivas` VALUES (null, '30', 'Taxa Elevada', '0');

INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '11111', 'artigo 1', '1.0', '10', 1);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '22222', 'artigo 2', '2.0', '1', 2);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '33333', 'artigo 3', '1.5', '100', 3);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '44444', 'artigo 4', '2.5', '42', 2);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '55555', 'artigo 5', '3.0', '16', 1);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '66666', 'artigo 6', '4.0', '20', 2);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '77777', 'artigo 7', '3.5', '80', 3);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '88888', 'artigo 8', '4.5', '30', 1);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '99999', 'artigo 9', '5.0', '25', 2);
INSERT INTO `psi_pl2_pws_e`.`produtos` VALUES (null, '00001', 'artigo 10', '6.0', '18', 3);

INSERT INTO `psi_pl2_pws_e`.`faturas` VALUES (null, '2022-06-16', '46.50', '6.02', '0', '2', '6'); 
INSERT INTO `psi_pl2_pws_e`.`faturas` VALUES (null, '2022-06-16', '136.50', '26.78', '0', '2', '5');
INSERT INTO `psi_pl2_pws_e`.`faturas` VALUES (null, '2022-06-16', '70.00', '10.49', '0', '4', '7');
INSERT INTO `psi_pl2_pws_e`.`faturas` VALUES (null, '2022-06-16', '82.50', '10.41', '0', '4', '5');

INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 1, 1.00, 0.23, 1, 1);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 2, 6.00, 0.72, 1, 10);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 6, 3.00, 4.14, 1, 5);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 1, 2.00, 0.26, 2, 2);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 6, 4.00, 3.12, 2, 6);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 21, 4.50, 21.74, 2, 8);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 1, 1.50, 0.09, 1, 3);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 4, 3.50, 0.84, 1, 7);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 1, 6.00, 0.36, 2, 10);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 2, 5.00, 1.30, 2, 9);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 1, 1.00, 0.23, 3, 1);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 6, 1.50, 0.54, 3, 3);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 6, 3.00, 4.14, 3, 5);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 4, 4.50, 4.14, 3, 8);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 4, 6.00, 1.44, 3, 10);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 1, 1.00, 0.23, 4, 1);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 7, 4.00, 3.64, 4, 6);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 5, 2.50, 1.63, 4, 4);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 7, 5.00, 4.55, 4, 9);
INSERT INTO `psi_pl2_pws_e`.`linhas` VALUES (null, 1, 6.00, 0.36, 4, 10);