import styled from 'styled-components'

import { Container } from 'components/Grid'
import Headline from 'components/Headline'
import { Rte } from 'components/Typography'
import InnerHTML from 'components/Html'

const Html = ({
  eyebrowEnabled,
  eyebrow,
  eyebrowTag,
  headline, 
  headlineTag,
  body,
  html
}) => {
  const layout = 'a'

  return (
    <S_Html
      className={`layout-${layout}`}
    >
      <Container>
        {eyebrowEnabled && eyebrow && (
          <Eyebrow as={eyebrowTag}>{eyebrow}</Eyebrow>
        )}
        {headline && (           
          <S_Headline 
            text={headline} 
            forwardedAs={headlineTag}
          />
        )}
        {body && (           
          <Body dangerouslySetInnerHTML={{ __html: body }} />
        )}
        {html && (
          <InnerHTML html={html} />
        )}
      </Container>      
    </S_Html>
  )
}

const S_Html = styled.div`
  margin: 65px 0;

  ${p => p.theme.media.minWidth('tablet')} {
    margin: 75px 0;
  }

  ${p => p.theme.media.minWidth('desktop')} {
    margin: 100px 0;
  }
`

const Eyebrow = styled.h1`
  margin: 0 0 10px 0;
  text-align: center;
  ${p => p.theme.mixins.acfTypography('global.h1Mobile.regular')};

  ${p => p.theme.media.minWidth('desktop')} {
    margin: 0 0 16px 0;
    ${p => p.theme.mixins.acfTypography('global.h1Desktop.regular')};
  }
`

const S_Headline = styled(Headline)`
  .layout-a & {    
    color: ${p =>
      p.theme.mixins.acfColor('modules.htmlA.headlineColor') ||
      p.theme.colors.black
    };

    strong {
      color: ${p =>
        p.theme.mixins.acfColor('modules.htmlA.headlineColorBold') ||
        'currentColor'
      };
    }
  }
`

const Body = styled(Rte)`
  margin: 0 0 30px 0;
  text-align: center;

  .layout-a & {    
    color: ${p =>
      p.theme.mixins.acfColor('modules.htmlA.bodyColor') ||
      p.theme.colors.black
    };
  }
`

export const GQL_HTML_MODULE = `  
  fragment HtmlModule on Page_Pagecontent_Modules_Html {   
    headline
    headlineTag
    body
    html
    eyebrow
    eyebrowEnabled
    eyebrowTag
    fieldGroupName
  }
`

export const GQL_CUSTOMIZE_HTML_MODULE = ( layout ) => `  
  fragment CustomizeHtml${layout}Module on Customize_Modules {
    html${layout} {         
      headlineColor
      headlineColorBold
      bodyColor
    }
  }
`

export default Html