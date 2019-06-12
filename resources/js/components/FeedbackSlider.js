import React, { Component, createRef } from 'react'
import {
  calculatePercentage,
  getClientCoordinates,
  getRelativePosition,
} from '../helpers/helpers'

class FeedbackSlider extends Component {
  static defaultProps = {
    onChange: null,
  }

  thumb = createRef()
  state = {
    isActive: false,
    x: 35,
    y: 115,
  }

  setActive = e => {
    e.persist()
    this.setState({ isActive: true }, () => {
      this.handleChange(e)
    })
  }

  setInactive = () => {
    this.setState({ isActive: false })
  }

  handleChange = e => {
    if (this.state.isActive === false) {
      return
    }
    const { clientX, clientY } = getClientCoordinates(e)
    const thumb = this.thumb.current
    const [x, y, width] = getRelativePosition(
      thumb.parentNode,
      clientX,
      clientY,
    )
    const CENTERX = width / 2
    const CENTERY = 115

    const angle = Math.atan2(x - CENTERX, y - CENTERY)

    const percentage = calculatePercentage(angle, Math.PI)

    if (percentage < 0 || percentage > 100) {
      return
    }

    this.setState({
      x: CENTERX + 100 * Math.sin(angle),
      y: CENTERY + 100 * Math.cos(angle),
    })

    this.props.onChange && this.props.onChange(percentage)
  }

  componentDidMount() {
    //
  }

  render() {
    const { x, y } = this.state
    return (
      <svg
        viewBox="0 0 270 150"
        onMouseLeave={this.setInactive}
        onTouchCancel={this.setInactive}
        onMouseUp={this.setInactive}
        onTouchEnd={this.setInactive}
        onMouseDown={this.setActive}
        onTouchStart={this.setActive}
        onMouseMove={this.handleChange}
        onTouchMove={this.handleChange}
        className="feedback-slider"
      >
        <defs>
          <linearGradient id="gradient">
            <stop stopColor="#ff42ab" offset="0%" />
            <stop stopColor="#c7da31" offset="100%" />
          </linearGradient>
        </defs>
        <text
          x={0}
          y={140}
          textAnchor="start"
          className="feedback-slider__text"
        >
          Ontevreden
        </text>
        <text
          x={270}
          y={140}
          textAnchor="end"
          className="feedback-slider__text"
        >
          Tevreden
        </text>
        <path
          d="M35 115 a1,1 0 0,1 200,0"
          stroke="url(#gradient)"
          fill="transparent"
          strokeWidth="5"
        />
        <circle
          ref={this.thumb}
          r="10"
          cx="0"
          cy="0"
          fill="#522871"
          style={{ transform: `translate(${x}px, ${y}px)` }}
        />
      </svg>
    )
  }
}

export default FeedbackSlider
