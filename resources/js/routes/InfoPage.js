import React from 'react'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Card from '../components/card/Card'
import LinkButton from '../components/LinkButton'
import Spacer from '../components/Spacer'

class InfoPage extends React.Component {
  render() {
    return (
      <>
        <Spacer />
        <Card>
          <CardHeader>Uitleg</CardHeader>
          <CardBody>
            <h2>Over de peiling</h2>
            <p>
              U zult een aantal stellingen krijgen die met eens of oneens te
              beantwoorden zijn. Zodra u een optie kiest gaat u door naar de
              volgende stelling. Veel succes!
            </p>
            <CardButtons>
              <LinkButton block to="/proposition/0">
                Begin
              </LinkButton>
            </CardButtons>
          </CardBody>
        </Card>
        <Spacer size={2} />
      </>
    )
  }
}

export default InfoPage
