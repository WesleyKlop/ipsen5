import React, { useState } from 'react'
import classnames from 'classnames'
import Card from './card/Card'

const CandidateCard = ({ profile, candidate_id, percentage, image }) => {
  const [open, setOpen] = useState(false)

  return (
    <div onClick={() => setOpen(!open)} className={classnames({ open })}>
      <Card>
        <div className="voter-result-page__container">
          <div
            className="voter-result-page__picture"
            style={{ backgroundImage: `URL(${image})` }}
          />
          <span className="voter-result-page__name">
            {profile.first_name} {profile.last_name}
          </span>
          <span className="voter-result-page__percentage">{percentage} %</span>
          <span className="voter-result-page__function">
            {profile.function} {profile.party}
          </span>
          <span className="voter-result-page__bio">{profile.bio}</span>
        </div>
      </Card>
      <br />
    </div>
  )
}

export default CandidateCard
