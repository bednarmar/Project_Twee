<?php

$conn->close();



/*do sprawdzania przesłanych wiadomości
        SELECT . . .  FROM priv_msg
        WHERE
        (sender_user_id =MOJE_ID AND recv_user_id = ID_ROZMOWCY)
        OR
        (sender_user_id = ID_ROZMOWCY AND recv_user_id = MOJE_ID)
        ORDER BY `date`
 */