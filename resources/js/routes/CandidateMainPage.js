import React, { useEffect, useState } from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import { Link } from 'react-router-dom'
import Button from '../components/Button'
import Auth from '../Auth'
import ApiClient from '../ApiClient'
import Spacer from '../components/Spacer'

const CandidateMainPage = ({ match }) => {
  const [authenticated, setAuthenticated] = useState(false)

  const authenticate = result => {
    Auth.authenticate(result)
    setAuthenticated(true)
  }

  useEffect(() => {
    ApiClient.request(`candidate/${match.params.loginCode}`)
      .then(result => authenticate(result))
      .catch(() => this.history.push('/'))
  }, [authenticated])

  return (
    <>
      <Spacer />
      <Card>
        <CardHeader>Welkom</CardHeader>
        <CardBody>
          <h2>Alvast bedankt!</h2>
          <p>
            Dank u wel voor het meewerken aan deze peiling, samen met uw
            gegevens zullen velen jongeren onderwezen worden. Uw profiel is al
            aangemaakt, u hoeft alleen nog maar wat info over uzelf toe te
            voegen. Hierna krijgt u gelijk de stellingen.
          </p>
          <CardButtons>
            <Link to="/profile" className="block">
              <Button disabled={!authenticated} className="block">
                Profiel aanvullen
              </Button>
            </Link>
          </CardButtons>
        </CardBody>
      </Card>
      <Spacer size={2} />
    </>
  )
}

export default CandidateMainPage
