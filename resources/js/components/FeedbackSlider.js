import React, { Component, createRef } from 'react'

const angleDifference = (angle1, angle2) => {
  const diff = ((angle2 - angle1 + Math.PI) % (Math.PI * 2)) - Math.PI
  return diff < -Math.PI ? diff + Math.PI * 2 : diff
}

const angleDifference2Percentage = difference => {
  return (difference / Math.PI) * 100 + 50
}

class FeedbackSlider extends Component {
  static CENTER = 75
  static defaultProps = {
    onChange: null,
  }

  thumb = createRef()
  state = {
    isActive: false,
  }

  setActive = () => this.setState({ isActive: true })
  setInactive = () => this.setState({ isActive: false })

  handleChange = e => {
    if (this.state.isActive === false) {
      return
    }
    const { clientX, clientY } = e
    const thumb = this.thumb.current
    const [x, y] = this.getRelativePosition(thumb.parentNode, clientX, clientY)

    const angle = Math.atan2(
      x - FeedbackSlider.CENTER,
      y - FeedbackSlider.CENTER,
    )
    const newX = FeedbackSlider.CENTER + 50 * Math.sin(angle)
    const newY = FeedbackSlider.CENTER + 50 * Math.cos(angle)

    thumb.style.transform = `translate(${newX}px, ${newY}px)`

    const percentage = angleDifference2Percentage(
      angleDifference(angle, Math.PI),
    )
    this.props.onChange && this.props.onChange(percentage)
  }

  componentDidMount() {}

  componentDidUpdate(prevProps) {}

  render() {
    return (
      <svg
        viewBox="0 0 150 75"
        style={{ width: 150, height: 75, margin: 'auto' }}
        onMouseLeave={this.setInactive}
        onMouseUp={this.setInactive}
        onClick={this.handleChange}
        onMouseDown={this.setActive}
        onMouseMove={this.handleChange}
      >
        <defs>
          <linearGradient id="gradient">
            <stop stopColor="#ff42ab" offset="0%" />
            <stop stopColor="#c7da31" offset="100%" />
          </linearGradient>
        </defs>
        <path
          d="M25 75 a1,1 0 0,1 100,0"
          stroke="url(#gradient)"
          fill="transparent"
          strokeWidth="3"
        />
        <circle ref={this.thumb} r="10" cx="0" cy="0" />
      </svg>
    )
  }

  getRelativePosition = (container, clientX, clientY) => {
    const { top, left } = container.getBoundingClientRect()
    return [clientX - left, clientY - top]
  }
}

export default FeedbackSlider
