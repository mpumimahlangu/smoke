db.createUser(
    {
        user    : "UserMpumi",
        pwd     :  "Mpumi112233",
        roles   :   [
            {
                role    :   "readWrite",
                db      :   "smoke"
            }
        ]
    }
)