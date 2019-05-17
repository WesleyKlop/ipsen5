import React from 'react'
import ProgressBar from '../components/ProgressBar'
import Spinner from '../components/Spinner'

const PropositionPage = () => (
    <>
        <div style={{ flex: '1' }}/>
        <div style={{ width: '100%', flex: '1', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
            <Spinner/>
        </div>
        <div style={{ flex: '2' }}/>
        <ProgressBar/>
    </>
)

export default PropositionPage
