SELECT T_ADHERENTS.nom,T_MESSAGES.message
FROM T_ADHERENTS,T_MESSAGES
WHERE T_ADHERENTS.id+T_MESSAGES.id_adherent
AND T_ADHERENTS.nom ='Machin';

SELECT T_ADHERENTS.nom, T_MESSAGES.texte
    FROM T_ADHERENTS
(INNER) [QUI VA SORTIR TOUT LES ADHERENTS QUI ONT LAISSE DES MESSAGES] ou (LEFT) [SORTIR TOUT LES ADHERENTS Y COMPRIS CEUX QUI N'ONT PAS LAISSE DE MESSAGE] ...
 ...  JOIN T_MESSAGES ON T_ADHERENT.id=T_MESSAGES
WHERE T_ADHERENT.nom = 'Michel';

