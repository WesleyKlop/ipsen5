import React from 'react'
import Card from '../components/card/Card'
import CardBody from '../components/card/CardBody'
import CardHeader from '../components/card/CardHeader'
import CardButtons from '../components/card/CardButtons'
import LinkButton from '../components/LinkButton'
import Spacer from '../components/Spacer'

const PageNotFoundPage = () => (
  <>
    <Spacer />
    <Card>
      <CardHeader>Pagina niet gevonden</CardHeader>
      <CardBody>
        <p>
          De pagina die je probeert te zoeken is niet gevonden. Ga naar de
          inlogpagina om deel te nemen aan een peiling.
        </p>
        <CardButtons>
          <LinkButton block to="/">
            Login
          </LinkButton>
        </CardButtons>
      </CardBody>
    </Card>
    <Spacer size={2} />
  </>
)

export default PageNotFoundPage
