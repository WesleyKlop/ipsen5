import React from 'react'
import Card from '../components/card/Card'
import CardBody from '../components/card/CardBody'
import CardHeader from '../components/card/CardHeader'
import CardButtons from '../components/card/CardButtons'
import LinkButton from '../components/LinkButton'

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
                  <LinkButton to="/">Login</LinkButton>
                </CardButtons>
            </CardBody>
        </Card>
        <div style={{flex: '2'}}/>
    </>
)

export default PageNotFoundPage
