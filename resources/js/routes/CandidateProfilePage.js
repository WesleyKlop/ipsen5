import React, { Component } from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Button from '../components/Button'
import Input from '../components/Input'
import ImageInput from '../components/ImageInput'
import TextArea from '../components/TextArea'
import Spacer from '../components/Spacer'
import Spinner from '../components/Spinner'
import ApiClient from '../ApiClient'

class CandidateProfilePage extends Component {
  state = {
    isLoading: false,
    profile: [],
  }

  setLoading = (loading, res = null) => {
    this.setState({ isLoading: loading })
    return res
  }

  setProfile = result => {
    this.setState({ profile: result.profile })
    this.setLoading(false)
  }

  componentDidMount() {
    ApiClient.request('me')
      .then(result => this.setProfile(result))
      .catch(error => console.error(error))
  }

  handleSubmit = e => {
    e.preventDefault()
    this.setLoading(true)
    ApiClient.request('profile', 'POST', new FormData(e.currentTarget))
      .then(res => this.setLoading(false, res))
      .then(() => this.props.history.push('/proposition/0'))
      .catch(err => console.error(err))
  }

  handleInputChange = event => {
    const target = event.target
    const name = target.name

    this.setState({
      profile: {
        ...this.state.profile,
        [name]: target.value,
      },
    })
  }

  render() {
    const { isLoading, profile } = this.state
    return (
      <>
        <Spacer />
        <Card>
          <CardHeader>Profiel</CardHeader>
          <CardBody>
            {isLoading ? (
              <div style={{ margin: 'auto' }}>
                <Spinner />
              </div>
            ) : (
              <form
                className="profile-page__container"
                method="POST"
                onSubmit={this.handleSubmit}
              >
                <ImageInput
                  name="profile_picture"
                  className="profile-page__pf"
                  required={profile.image_extension === null}
                  onChange={this.handleInputChange}
                  placeholderUrl={
                    profile.image_extension === null
                      ? null
                      : `/storage/profiles/${profile.user_id}.${profile.image_extension}`
                  }
                />
                <Input
                  name="first_name"
                  placeholder="Voornaam"
                  className="profile-page__fn"
                  autoComplete="given-name"
                  required
                  value={profile.first_name}
                  onChange={this.handleInputChange}
                />
                <Input
                  name="last_name"
                  placeholder="Achternaam"
                  className="profile-page__ln"
                  autoComplete="family-name"
                  required
                  value={profile.last_name}
                  onChange={this.handleInputChange}
                />
                <Input
                  name="party"
                  placeholder="Partij"
                  className="profile-page__prt"
                  autoComplete="off"
                  required
                  value={profile.party}
                  onChange={this.handleInputChange}
                />
                <Input
                  name="function"
                  placeholder="Functie"
                  className="profile-page__fct"
                  autoComplete="off"
                  required
                  value={profile.function}
                  onChange={this.handleInputChange}
                />
                <TextArea
                  name="bio"
                  placeholder="Iets over jezelf"
                  className="profile-page__bio"
                  autoComplete="off"
                  minLength={2}
                  maxLength={255}
                  required
                  value={profile.bio}
                  onChange={this.handleInputChange}
                />
                <CardButtons>
                  <Button className="block">Opslaan</Button>
                </CardButtons>
              </form>
            )}
          </CardBody>
        </Card>
        <Spacer size={2} />
      </>
    )
  }
}

export default CandidateProfilePage
