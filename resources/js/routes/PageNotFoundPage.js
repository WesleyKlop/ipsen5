import React from 'react'
import {Link} from "react-router-dom";
import Card from "../components/card/Card";
import Button from "../components/card/Button";
import CardBody from "../components/card/CardBody";
import CardHeader from "../components/card/CardHeader";
import CardButtons from "../components/card/CardButtons";

const PageNotFoundPage = () => (
    <>
        <div style={{flex: '1'}}/>
        <Card>
            <CardHeader>
                Pagina niet gevonden
            </CardHeader>
            <CardBody>
                <p>
                    De pagina die u probeert te zoeken is niet gevonden. Ga naar de inlogpagina om de peiling te starten.
                </p>
                <CardButtons>
                    <Link to="/" className="block">
                        <Button className="block">Login</Button>
                    </Link>
                </CardButtons>
            </CardBody>
        </Card>
        <div style={{flex: '2'}}/>
    </>
)

export default PageNotFoundPage
