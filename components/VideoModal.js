import { useContext, useState } from 'react'
import styled from 'styled-components'
import ReactModal from 'react-modal'
import YouTubePlayer from 'react-youtube'
import VimeoPlayer from '@u-wave/react-vimeo'

import AppContext from 'contexts/App'
import Box from 'components/Box'
import { Icon } from 'components/SVGIcons'

const VideoModal = ({
  ...props
}) => {
  const [box, setBox] = useState({ width: 16, height: 9 })
  
  ReactModal.setAppElement('#__next')
  
  const {
    videoModalOpen,
    videoModalUrl,
    closeVideoModal
  } = useContext(AppContext)

  const onReady = async ( e ) => {
    switch ( type(videoModalUrl) ) {
      case 'youtube':
        setBox(e.target.getSize())
        break
      case 'vimeo':
        const width = await e.getVideoWidth()
        const height = await e.getVideoHeight()
        setBox({ width, height })        
        break
    }    
  }

  const onCloseClick = () => {
    closeVideoModal()    
  }

  const onRequestClose = () => {
    closeVideoModal()    
  }

  const onEnd = () => {
    closeVideoModal()    
  }

  const getYouTubeIdFromUrl = ( url ) => {
    return url.match(/.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/)[1]
  }

  const getVimeoIdFromUrl = ( url ) => {
    return url.match(/^(http\:\/\/|https\:\/\/)?(www\.)?(vimeo\.com\/)([0-9]+)$/)[4]
  }

  const type = ( url ) => {
    if ( /^(https?\:\/\/)?((www\.)?youtube\.com|youtu\.be)\/.+$/.test(url) ) {
      return 'youtube'
    } else if ( /^(http\:\/\/|https\:\/\/)?(www\.)?(vimeo\.com\/)([0-9]+)$/.test(url) ) {
      return 'vimeo'
    }
  }

  const renderPlayer = () => {      
    switch ( type(videoModalUrl) ) {
      case 'youtube':
        return (
          <YouTubePlayer            
              videoId={getYouTubeIdFromUrl(videoModalUrl)}
              opts={{
                playerVars: {
                  autoplay: 1,
                }
              }}
              onReady={onReady}
              onEnd={onEnd}
          />
        )
      case 'vimeo':
        return (
          <VimeoPlayer
            video={getVimeoIdFromUrl(videoModalUrl)}
            onReady={onReady}
            onEnd={onEnd}
            autoplay
          />
        )
    }
  }
  
  return (    
    <ReactModal
        isOpen={!!videoModalOpen}
        onRequestClose={onRequestClose}
        contentElement={(props, children) => (
            <Content {...props}>{children}</Content>
          )}
        {...props}
    >
      <Player>     
        <Close onClick={onCloseClick}>
          <Icon icon='close' />
        </Close>    
        <Box {...box}>
          {renderPlayer()}
        </Box>
      </Player>
    </ReactModal>
  )
}

const Content = styled.div`
  margin: auto;
  max-width: 1200px; 
  overflow: visible !important;
`

const Player = styled.div`
  width: 100%;
  background-color: ${p => p.theme.colors.black};
 
  iframe {
    ${p => p.theme.mixins.fill('absolute')};
  }
`

const Close = styled.button`
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: -12px;
  right: -12px;
  color: ${p => p.theme.mixins.acfColor('components.videoModal.closeColor')}; 
  background-color: ${p => p.theme.colors.white};
  z-index: 2;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  font-size: 1rem;
  
  ${p => p.theme.media.minWidth('tablet')} {
    top: -17px;
    right: -17px;
    width: 35px;
    height: 35px;
    font-size: 1.4rem;  
  }  
`

export const GQL_CUSTOMIZE_VIDEO_MODAL = `
  fragment CustomizeVideoModal on Customize_Components {
    videoModal {
      closeColor
    }    
  }
`

export default VideoModal
